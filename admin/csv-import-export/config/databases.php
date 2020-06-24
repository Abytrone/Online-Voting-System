<?php

//==================================================================================================
//  DATABASES
//==================================================================================================

$_databases = array(
    'votesystem@localhost:3306' => array(
        'label'    => 'votesystem',
        'name'     => 'votesystem',
        'server'   => 'localhost',
        'username' => 'root',
        'password' => '',
        'port'     => '3306',
        'encoding' => 'latin1',
        'active'   => true,
        'tables'   => array(
            'admin' => array(
                'label'      => 'admin',
                'active'     => true,
                'properties' => array(
                    array(
                        'name'    => 'admin',
                        'columns' => '*'
                    )
                )
            ),
            'candidates' => array(
                'label'      => 'candidates',
                'active'     => true,
                'properties' => array(
                    array(
                        'name'    => 'candidates',
                        'columns' => '*'
                    )
                )
            ),
            'positions' => array(
                'label'      => 'positions',
                'active'     => true,
                'properties' => array(
                    array(
                        'name'    => 'positions',
                        'columns' => '*'
                    )
                )
            ),
            'users' => array(
                'label'      => 'users',
                'active'     => true,
                'properties' => array(
                    array(
                        'name'    => 'users',
                        'columns' => '*'
                    )
                )
            ),
            'voters' => array(
                'label'      => 'voters',
                'active'     => true,
                'properties' => array(
                    array(
                        'name'    => 'voters',
                        'columns' => array(
                            array(
                                'label'  => 'id',
                                'name'   => 'id',
                                'active' => false
                            ),
                            array(
                                'label'  => 'password',
                                'name'   => 'password',
                                'active' => false
                            ),
                            array(
                                'label'  => 'firstname',
                                'name'   => 'firstname',
                                'active' => true
                            ),
                            array(
                                'label'  => 'lastname',
                                'name'   => 'lastname',
                                'active' => true
                            ),
                            array(
                                'label'  => 'indexnumber',
                                'name'   => 'indexnumber',
                                'active' => true
                            ),
                            array(
                                'label'  => 'status',
                                'name'   => 'status',
                                'active' => true
                            )
                        )
                    )
                )
            ),
            'votes' => array(
                'label'      => 'votes',
                'active'     => true,
                'properties' => array(
                    array(
                        'name'    => 'votes',
                        'columns' => '*'
                    )
                )
            )
        )
    )
);

?>
