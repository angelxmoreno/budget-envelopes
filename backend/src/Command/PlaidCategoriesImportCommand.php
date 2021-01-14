<?php
declare(strict_types=1);

namespace App\Command;

use App\Model\Table\PlaidCategoriesTable;
use Cake\Command\Command;
use Cake\Console\Arguments;
use Cake\Console\ConsoleIo;

/**
 * PlaidCategoriesImport command.
 *
 * @property-read PlaidCategoriesTable $PlaidCategories
 */
class PlaidCategoriesImportCommand extends Command
{
    public function initialize(): void
    {
        parent::initialize();
        $this->loadModel(PlaidCategoriesTable::class);
    }

    /**
     * Implement this method with your command's logic.
     *
     * @param \Cake\Console\Arguments $args The command arguments.
     * @param \Cake\Console\ConsoleIo $io The console io
     * @return null|void|int The exit code or null for success
     */
    public function execute(Arguments $args, ConsoleIo $io)
    {
        $raw_plaid_categories = require_once CONFIG . 'schema' . DS . 'plaid_categories.php';
        $categories = [];
        foreach ($raw_plaid_categories as $pos => $category) {
            $category = array_merge($category, [
                'id' => $category['category_id'],
                'grouping' => $category['group'],
                'name' => end($category['hierarchy']),
                'path' => $this->hierarchyToString($category['hierarchy']),
                'parent_path' => $this->hierarchyToParentString($category['hierarchy'])
            ]);
            $categories[$category['path']] = $category;
        }
        foreach ($categories as $path => $category) {
            if (!!$category['parent_path'] && $parent = $categories[$category['parent_path']]) {
                $categories[$path]['parent_id'] = $parent['id'];
            }
        }
        $entities = $this->PlaidCategories->newEntities($categories);
        $this->PlaidCategories->saveManyOrFail($entities);
    }

    protected function hierarchyToString(array $hierarchy): string
    {
        return implode('.', $hierarchy);
    }

    protected function hierarchyToParentString(array $hierarchy): ?string
    {
        $path = implode('.', array_splice($hierarchy, 0, count($hierarchy) - 1));
        return $path !== ''
            ? $path
            : null;
    }
}
