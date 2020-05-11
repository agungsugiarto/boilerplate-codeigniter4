<?php

namespace App\Commands;

use CodeIgniter\CLI\BaseCommand;

/**
 * Class InstallCommand.
 */
class RefreshCommand extends BaseCommand
{
    /**
     * The group the command is lumped under
     * when listing commands.
     *
     * @var string
     */
    protected $group = 'boilerplate';

    /**
     * The command's name.
     *
     * @var string
     */
    protected $name = 'boilerplate:refresh';

    /**
     * The command's short description.
     *
     * @var string
     */
    protected $description = 'Db refresh for basic boilerplate data.';

    /**
     * The command's usage.
     *
     * @var string
     */
    protected $usage = 'boilerplate:refresh';

    /**
     * The commamd's argument.
     *
     * @var array
     */
    protected $arguments = [];

    /**
     * The command's options.
     *
     * @var array
     */
    protected $options = [];

    //--------------------------------------------------------------------

    /**
     * Displays the help for the spark cli script itself.
     *
     * @param array $params
     */
    public function run(array $params)
    {
        try {
            // migrate all first
            $this->call('migrate:refresh', $params);
            // then seed data
            $this->call('db:seed', ['agungsugiarto\boilerplate\Database\Seeds\BoilerplateSeeder']);
        } catch (\Exception $e) {
            $this->showError($e);
        }
    }
}
