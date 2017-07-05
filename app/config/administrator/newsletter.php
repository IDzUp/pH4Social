<?php

return array(

    /**
     * Model title
     *
     * @type string
     */
    'title' => 'Newletter',

    /**
     * The singular name of your model
     *
     * @type string
     */
    'single' => 'signup',

    /**
     * The class name of the Eloquent model that this config represents
     *
     * @type string
     */
    'model' => 'Fbf\LaravelNewsletterSignup\Signup',

    /**
     * The columns array
     *
     * @type array
     */
    'columns' => array(
        'email' => array(
            'title' => 'Email address',
            'select' => "CASE WHEN deleted_at IS NULL THEN email ELSE CONCAT('<s>',email,'</s>') END",
        ),
        'created_at' => array(
            'title' => 'Created',
        ),
        'updated_at' => array(
            'title' => 'Updated',
        ),
        'deleted_at' => array(
            'title' => 'Deleted',
        ),
    ),

    /**
     * The query filter option lets you modify the query parameters before Administrator begins to construct the query. For example, if you want
     * to have one page show only deleted items and another page show all of the items that aren't deleted, you can use the query filter to do
     * that.
     *
     * @type closure
     */
    'query_filter' => function ($query) {
        unset($query->wheres[0]);
    },

    /**
     * The edit fields array
     *
     * @type array
     */
    'edit_fields' => array(
        'email' => array(
            'title' => 'Email address',
            'editable' => false,
        ),
        'created_at' => array(
            'title' => 'Created',
            'editable' => false,
        ),
        'updated_at' => array(
            'title' => 'Updated',
            'editable' => false,
        ),
        'deleted_at' => array(
            'title' => 'Deleted',
            'editable' => false,
        ),
    ),

    /**
     * The filter fields
     *
     * @type array
     */
    'filters' => array(
        'email' => array(
            'title' => 'Email address',
            'type' => 'text',
        ),
        'updated_at' => array(
            'title' => 'Updated',
            'type' => 'date',
        ),
    ),

    /**
     * The sort options for a model
     *
     * @type array
     */
    'sort' => array(
        'field' => 'updated_at',
        'direction' => 'desc',
    ),

    /**
     * This is where you can define the model's global custom actions
     */
    'global_actions' => array(
        'signups' => array(
            'title' => 'Download Signups CSV',
            'messages' => array(
                'active' => 'Creating the CSV File...',
                'success' => 'CSV File created! Downloading now...',
                'error' => 'There was an error while creating the CSV FIle',
            ),
            //the Eloquent query builder is passed to the closure
            'action' => function ($query) {
                $fields = array(
                    'email' => 'Email address',
                    'updated_at' => 'Updated',
                );

                //get all the rows for this query
                $result = $query->whereNull('deleted_at')->select(array_keys($fields))->get()->toArray();

                $filePath = storage_path() . DIRECTORY_SEPARATOR . uniqid('signups') . '.csv';

                $fp = fopen($filePath, 'w');

                fwrite($fp, chr(255) . chr(254));
                $fields = '"' . implode("\"\t\"", $fields) . '"' . "\n";
                $fields = mb_convert_encoding($fields, 'UTF-16LE', 'UTF-8');
                fwrite($fp, $fields);

                foreach ($result as $row) {
                    // Add each row, fields enclosed by ", terminated by \t as per M$ Excel
                    $line = '"' . implode("\"\t\"", $row) . '"' . "\n";
                    $line = mb_convert_encoding($line, 'UTF-16LE', 'UTF-8');
                    fwrite($fp, $line);
                }

                fclose($fp);

                //return a download response
                return Response::download($filePath);
            }
        ),
        'unsubscribes' => array(
            'title' => 'Download Unsubscribes CSV',
            'messages' => array(
                'active' => 'Creating the CSV File...',
                'success' => 'CSV File created! Downloading now...',
                'error' => 'There was an error while creating the CSV FIle',
            ),
            //the Eloquent query builder is passed to the closure
            'action' => function ($query) {
                $fields = array(
                    'email' => 'Email address',
                    'deleted_at' => 'Deleted',
                );

                unset($query->wheres[0]);

                //get all the rows for this query
                $result = $query->whereNotNull('deleted_at')->select(array_keys($fields))->get()->toArray();

                $filePath = storage_path() . DIRECTORY_SEPARATOR . uniqid('unsubscribes') . '.csv';

                $fp = fopen($filePath, 'w');

                fwrite($fp, chr(255) . chr(254));
                $fields = '"' . implode("\"\t\"", $fields) . '"' . "\n";
                $fields = mb_convert_encoding($fields, 'UTF-16LE', 'UTF-8');
                fwrite($fp, $fields);

                foreach ($result as $row) {
                    // Add each row, fields enclosed by ", terminated by \t as per M$ Excel
                    $line = '"' . implode("\"\t\"", $row) . '"' . "\n";
                    $line = mb_convert_encoding($line, 'UTF-16LE', 'UTF-8');
                    fwrite($fp, $line);
                }

                fclose($fp);

                //return a download response
                return Response::download($filePath);
            }
        ),
    ),

    /**
     * The action_permissions option lets you define permissions on the four primary actions: 'create', 'update', 'delete', and 'view'.
     * It also provides a secondary place to define permissions for your custom actions.
     *
     * @type array
     */
    'action_permissions' => array(
        'create' => function ($model) {
            return false;
        },
        'update' => function ($model) {
            return false;
        }
    ),

);