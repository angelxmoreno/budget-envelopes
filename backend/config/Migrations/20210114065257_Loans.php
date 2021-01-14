<?php
declare(strict_types=1);

use Migrations\AbstractMigration;

class Loans extends AbstractMigration
{
    public $autoId = false;

    /**
     * Up Method.
     *
     * More information on this method is available here:
     * https://book.cakephp.org/phinx/0/en/migrations.html#the-up-method
     * @return void
     */
    public function up()
    {

        $this->table('bills')
            ->changeColumn('is_auto_paid', 'boolean', [
                'default' => '0',
                'limit' => null,
                'null' => false,
            ])
            ->update();
        $this->table('loans')
            ->addColumn('id', 'integer', [
                'autoIncrement' => true,
                'default' => null,
                'limit' => null,
                'null' => false,
                'signed' => false,
            ])
            ->addPrimaryKey(['id'])
            ->addColumn('issuer', 'string', [
                'default' => null,
                'limit' => 100,
                'null' => false,
            ])
            ->addColumn('name', 'string', [
                'default' => '',
                'limit' => 100,
                'null' => false,
            ])
            ->addColumn('url', 'text', [
                'default' => null,
                'limit' => null,
                'null' => true,
            ])
            ->addColumn('img_url', 'text', [
                'default' => null,
                'limit' => null,
                'null' => true,
            ])
            ->addColumn('apr', 'float', [
                'default' => null,
                'null' => false,
                'precision' => 4,
                'scale' => 2,
                'signed' => false,
            ])
            ->addColumn('amount', 'float', [
                'default' => null,
                'null' => false,
                'precision' => 16,
                'scale' => 2,
            ])
            ->addColumn('date_issued', 'date', [
                'default' => null,
                'limit' => null,
                'null' => false,
            ])
            ->addColumn('terms', 'smallinteger', [
                'default' => null,
                'limit' => null,
                'null' => false,
                'signed' => false,
            ])
            ->addColumn('due_date', 'date', [
                'default' => null,
                'limit' => null,
                'null' => false,
            ])
            ->addColumn('is_auto_paid', 'boolean', [
                'default' => false,
                'limit' => null,
                'null' => false,
            ])
            ->addColumn('created', 'datetime', [
                'default' => null,
                'limit' => null,
                'null' => true,
            ])
            ->addColumn('modified', 'datetime', [
                'default' => null,
                'limit' => null,
                'null' => true,
            ])
            ->create();

        $this->table('credit_cards')
            ->addColumn('is_auto_paid', 'boolean', [
                'after' => 'due_date',
                'default' => '0',
                'length' => null,
                'null' => false,
            ])
            ->update();
    }

    /**
     * Down Method.
     *
     * More information on this method is available here:
     * https://book.cakephp.org/phinx/0/en/migrations.html#the-down-method
     * @return void
     */
    public function down()
    {

        $this->table('bills')
            ->changeColumn('is_auto_paid', 'boolean', [
                'default' => '0',
                'length' => null,
                'null' => true,
            ])
            ->update();

        $this->table('credit_cards')
            ->removeColumn('is_auto_paid')
            ->update();

        $this->table('loans')->drop()->save();
    }
}
