<?php
declare(strict_types=1);

namespace App\Controller;

use App\Model\Entity\Bill;
use App\Model\Entity\CreditCard;
use App\Model\Entity\Loan;
use App\Model\Enums\Frequency;
use App\Model\Table\BillsTable;
use App\Model\Table\CreditCardsTable;
use App\Model\Table\IncomesTable;
use App\Model\Table\LoansTable;
use App\Utils\TimelineItem;
use App\Utils\TimeSeries;
use Cake\Chronos\Chronos;
use Cake\I18n\Number;
use Cake\ORM\Entity;

/**
 * Timeline Controller
 *
 * @property-read IncomesTable $Incomes
 * @property-read BillsTable $Bills
 * @property-read CreditCardsTable $CreditCards
 * @property-read LoansTable $Loans
 */
class TimelineController extends AppController
{
    protected $year;
    protected $month;

    /**
     * @var Chronos
     */
    protected $now;

    /**
     * @var TimelineItem[][]
     */
    protected $days;

    public function initialize(): void
    {
        parent::initialize();
        $this->loadModel(IncomesTable::class);
        $this->loadModel(BillsTable::class);
        $this->loadModel(CreditCardsTable::class);
        $this->loadModel(LoansTable::class);
    }

    /**
     * @throws \Exception
     */
    public function index()
    {
        $this->buildTimeLine();
        $data = [
            'now' => $this->now,
            'timelineItems' => $this->getTimeLineSeries()
        ];
        $this->set($data);
        $this->set('_serialize', array_keys($data));
    }

    /**
     * @throws \Exception
     */
    protected function buildTimeLine()
    {
        $this->year = (int)$this->getRequest()->getQuery('year', 2021);
        $this->month = (int)$this->getRequest()->getQuery('month', 1);
        $this->now = Chronos::create($this->year, $this->month);
        $this->days = array_combine(range(1, $this->now->daysInMonth), array_fill(0, $this->now->daysInMonth, []));

        $this->injectPayDays();
        $this->injectBills();
        $this->injectLoans();
        $this->injectCreditCards();
    }

    /**
     * @throws \Exception
     */
    protected function injectPayDays()
    {
        $income = $this->Incomes->get(1);
        $series = TimeSeries::getSeries(
            $income->first_pay_check_date->toMutable(),
            $this->now->endOfMonth()->toMutable(),
            $income->frequency
        );

        $this->injectAction($series, 'Pay day', $income, $income->net);
    }

    /**
     * @param array $series
     * @param string $group
     * @param Entity $entity
     * @param float $amount
     */
    protected function injectAction(array $series, string $group, Entity $entity, float $amount)
    {
        foreach ($series as $date) {
            $this->days[$date->day][] = new TimelineItem($group, $amount, $entity);
        }
    }

    /**
     * @throws \Exception
     */
    protected function injectBills()
    {
        /** @var Bill[] $bills */
        $bills = $this->Bills->find()->all();
        foreach ($bills as $bill) {
            $series = TimeSeries::getSeries(
                $bill->due_date->toMutable(),
                $this->now->endOfMonth()->toMutable(),
                $bill->frequency
            );
            $this->injectAction($series, 'Bill', $bill, $bill->amount * -1);
        }
    }

    /**
     * @throws \Exception
     */
    protected function injectLoans()
    {
        /** @var Loan[] $loans */
        $loans = $this->Loans->find()->all();
        foreach ($loans as $loan) {
            $series = TimeSeries::getSeries(
                $loan->due_date->toMutable(),
                $this->now->endOfMonth()->toMutable(),
                Frequency::MONTHLY
            );

            $this->injectAction($series, 'Loan', $loan, $loan->monthly_payment * -1);
        }
    }

    /**
     * @throws \Exception
     */
    protected function injectCreditCards()
    {
        /** @var CreditCard[] $creditCards */
        $creditCards = $this->CreditCards->find()->all();
        foreach ($creditCards as $creditCard) {
            $series = TimeSeries::getSeries(
                $creditCard->due_date->toMutable(),
                $this->now->endOfMonth()->toMutable(),
                Frequency::MONTHLY
            );

            $this->injectAction($series, 'Credit Card', $creditCard, $creditCard->minimum_payment * -1);
        }
    }

    protected function getTimeLineSeries()
    {
        $series = [];
        foreach ($this->days as $day => $items) {
            if ($this->now->day === $day) {

            }

            if (count($items) > 0) {
                $row = [];
                $row['date'] = '<h3>' . $this->now->copy()->day($day)->format('D M jS, Y') . '</h3>';
                $row['content'] = '';
                foreach ($items as $item) {
                    $amount = Number::currency($item->getAmount());
                    $row['content'] .= "<p><b>{$item->getGroup()}</b> {$item->getName()} <i>{$amount}</i></p>";
                }

                $series[] = $row;
            }
        }

        return $series;
    }
}
