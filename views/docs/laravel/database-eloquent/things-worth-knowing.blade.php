<h1>Database and Eloquent Things Worth Knowing</h1>
{{-- blade-formatter-disable --}}
<?php use Illuminate\Support\Facades\Schema; ?>

<x-toc />

<x-gt-markdown class="-ml-4">
    @verbatim
        ```php
        use Illuminate\Support\Facades\Schema;
    @endverbatim
</x-gt-markdown>
<x-docs.sections.layout title="Existence">
    <x-gt-markdown class="-ml-6">
        @verbatim
            ```php
            $hasTable = Schema::hasTable('users')
        @endverbatim
    </x-gt-markdown>
    <x-gt-markdown class="-ml-6">
        @verbatim
            ```php
            $hasColumn = Schema::hasColumn('users', 'email');
        @endverbatim
    </x-gt-markdown>
    <x-gt-markdown class="-ml-6">
        @verbatim
            ```php
            $hasColumns = Schema::hasColumns('users', ['id', 'name', 'email']);
        @endverbatim
    </x-gt-markdown>
    <x-docs.h3 title="Method signatures" />
    <x-gt-markdown class="-ml-6">
        @verbatim
            ```php
            public function hasColumn($table, $column){}
            public function hasColumns($table, array $columns){}
            public function hasTable($table){}
        @endverbatim
    </x-gt-markdown>
</x-docs.sections.layout>

<x-docs.sections.layout title="Database and Table Exploration">
    <x-docs.h3 title="Retrieving table names from a database" />
    <x-gt-markdown class="-ml-6">
        @verbatim
            ```php
            $tableListing = Schema::getTableListing();
            // Output: ['users', 'posts', 'orders', ...]
        @endverbatim
    </x-gt-markdown>
    <x-docs.h3 title="Retrieving detailed information of database tables" />
    <x-gt-markdown class="-ml-6">
        @verbatim
            ```php
            $tables = Schema::getTables();
            // Output:
            [
            "name" => "courses",
            "schema" => null,
            "size" => null,
            "comment" => null,
            "collation" => null,
            "engine" => null
            ]
        @endverbatim
    </x-gt-markdown>
    <x-docs.h3 title="Retrieving column names from a database table" />
    <x-gt-markdown class="-ml-6">
        @verbatim
            ```php
            $columnNames = Schema::getColumnListing('users');
            // Output: ['id', 'name', 'email', 'password', ...]
        @endverbatim
    </x-gt-markdown>
    <x-docs.h3 title="Retrieving detailed information of database columns" />
    <x-gt-markdown class="-ml-6">
        @verbatim
            ```php
            $columns = Schema::getColumns('users');
            // Output:
            [
                "name" => "name",
                "type_name" => "varchar",
                "type" => "varchar",
                "collation" => null,
                "nullable" => false,
                "default" => null,
                "auto_increment" => false,
                "comment" => null
            ]
        @endverbatim
    </x-gt-markdown>
    <x-docs.h3 title="Get the data type for a given column name" />

    @php
        // $x = Schema::getColumnType('users', 'email', true);
        // $x = Schema::getColumnType('users', 'created_at', true);
        // dd($x)
    @endphp

    <x-gt-markdown class="-ml-6">
        @verbatim
            ```php
            $emailDataType = Schema::getColumnType('users', 'email', true);
            // Output: string
            $createAtDataType = Schema::getColumnType('users', 'created_at', true);
            // Output: datetime
        @endverbatim
    </x-gt-markdown>
    <x-docs.h3 title="Method signatures" />
    <x-gt-markdown class="-ml-6">
        @verbatim
            ```php
            public function getTableListing()
            public function getTables()
            public function getColumnListing($table)
            public function getColumns($table)
            public function getColumnType($table, $column, $fullDefinition = false)
        @endverbatim
    </x-gt-markdown>
</x-docs.sections.layout>


<x-docs.sections.layout title="Other Methods">
    <x-gt-markdown class="-ml-4">
        @verbatim
            ```php
            public function whenTableHasColumn(string $table, string $column, Closure $callback)
            public function whenTableDoesntHaveColumn(string $table, string $column, Closure $callback)
            public function table($table, Closure $callback)
            protected function build(Blueprint $blueprint)
            public function getViews()
            public function getTypes()
            public function getIndexes($table)
            public function getIndexListing($table)
            public function getForeignKeys($table)
        @endverbatim
    </x-gt-markdown>
</x-docs.sections.layout>

<x-docs.sections.layout title="Other Examples">
    <x-gt-markdown class="-ml-4">
        @verbatim
        ```php
        public function getTableColumTypes()
        {
            $columns = Schema::getColumns('chapters');

            $types = [];

            foreach ($columns as $column) {
                $types[$column['name']] = $column['type_name'];
            }

            return $types;
        }
        @endverbatim
    </x-gt-markdown>
</x-docs.sections.layout>
