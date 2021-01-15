<?php
declare(strict_types=1);

namespace App\Utils;

use App\Model\Enums\Frequency;
use Cake\Chronos\Chronos;

/**
 * Class TimeSeries
 * @package App\Utils
 */
class TimeSeries
{
    /**
     * @var Chronos
     */
    protected $initial_date;

    /**
     * @var Chronos
     */
    protected $end_date;

    /**
     * @var string
     */
    protected $frequency;

    /**
     * @var Chronos[]
     */
    protected $series = [];

    /**
     * TimeSeries constructor.
     * @param \DateTime $initial_date
     * @param \DateTime $end_date
     * @param string $frequency
     * @throws \Exception
     */
    public function __construct(\DateTime $initial_date, \DateTime $end_date, string $frequency)
    {
        $this->initial_date = new Chronos($initial_date);
        $this->end_date = new Chronos($end_date);
        $this->frequency = $frequency;
        $this->series = $this->buildSeries();
    }

    /**
     * @return array
     * @throws \Exception
     */
    protected function buildSeries(): array
    {
        $series = [];
        $next_date = $this->initial_date;
        if ($this->dateInMonth($next_date, $this->end_date)) {
            $series[] = $next_date;
        }
        do {
            $next_date = $next_date->add(new \DateInterval(Frequency::toPeriod($this->frequency)));
            if ($this->dateInMonth($next_date, $this->end_date)) {
                $series[] = $next_date;
            }
        } while ($next_date->lessThanOrEquals($this->end_date));

        return $series;
    }

    /**
     * @param \DateTime $initial_date
     * @param \DateTime $end_date
     * @param string $frequency
     * @return Chronos[]
     * @throws \Exception
     */
    public static function getSeries(\DateTime $initial_date, \DateTime $end_date, string $frequency): array
    {
        $self = new self($initial_date, $end_date, $frequency);

        return $self->series;
    }

    protected function dateInMonth(Chronos $date, Chronos $target): bool
    {
        return $date->year === $target->year && $date->month === $target->month;
    }

}
