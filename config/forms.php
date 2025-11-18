<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Adult Intake Form Structure
    |--------------------------------------------------------------------------
    */
    'adult-intake' => [

        'title' => 'Adult Intake Form',
        'steps' => 7,  // total pages

        'pages' => [

            'page1' => [
                'title' => 'Personal Information',
                'fields' => [
                    [
                        'name' => 'full_name',
                        'label' => 'Full Name',
                        'type' => 'text',
                        'required' => true,
                    ],
                    [
                        'name' => 'dob',
                        'label' => 'Date of Birth',
                        'type' => 'date',
                        'required' => true,
                    ],
                    [
                        'name' => 'email',
                        'label' => 'Email',
                        'type' => 'email',
                        'required' => true,
                    ],
                ],
            ],

            'page2' => [
                'title' => 'Medical History',
                'fields' => [
                    [
                        'name' => 'diagnosis',
                        'label' => 'Do you have any diagnosis?',
                        'type' => 'textarea',
                    ],
                    [
                        'name' => 'medications',
                        'label' => 'Current Medications',
                        'type' => 'textarea',
                    ],
                ],
            ],

            'page3' => [
                'title' => 'Lifestyle Questions',
                'fields' => [
                    [
                        'name' => 'exercise',
                        'label' => 'Do you exercise regularly?',
                        'type' => 'radio',
                        'options' => [
                            'yes' => 'Yes',
                            'no' => 'No',
                        ],
                    ],
                    [
                        'name' => 'sleep_hours',
                        'label' => 'Average Sleep Hours',
                        'type' => 'number',
                    ],
                ],
            ],

            // -----------------------------------------
            // Example of Survey Pages (Scoring Based)
            // -----------------------------------------
            'page4' => [
                'title' => 'Sensory Processing Survey',
                'fields' => [
                    [
                        'name' => 'vestibular_balance',
                        'label' => 'Balance issues?',
                        'type' => 'radio-score',
                        'options' => [
                            '0' => "Doesn't Apply",
                            '1' => 'Mild',
                            '2' => 'Mild to Moderate',
                            '3' => 'Moderate',
                            '4' => 'Moderate to Severe',
                            '5' => 'Severe',
                        ],
                    ],
                    [
                        'name' => 'vestibular_motion',
                        'label' => 'Motion sensitivity?',
                        'type' => 'radio-score',
                        'options' => [
                            '0' => "Doesn't Apply",
                            '1' => 'Mild',
                            '2' => 'Mild to Moderate',
                            '3' => 'Moderate',
                            '4' => 'Moderate to Severe',
                            '5' => 'Severe',
                        ],
                    ],
                ],
            ], 
            'page5' => [
                'title' => 'Auditory Sensitivity Survey',
                'fields' => [
                    [
                        'name' => 'sound_sensitivity',
                        'label' => 'Sensitivity to sounds?',
                        'type' => 'radio-score',
                        'options' => [
                            '0' => "Doesn't Apply",
                            '1' => 'Mild',
                            '2' => 'Mild to Moderate',
                            '3' => 'Moderate',
                            '4' => 'Moderate to Severe',
                            '5' => 'Severe',
                        ],
                    ],
                ],
            ],

            'page6' => [
                'title' => 'Check All That Apply',
                'fields' => [
                    [
                        'name' => 'symptoms',
                        'label' => 'Symptoms',
                        'type' => 'checkbox-group',
                        'options' => [
                            'headaches' => 'Headaches',
                            'dizziness' => 'Dizziness',
                            'fatigue' => 'Fatigue',
                        ],
                    ],
                ],
            ],

            'page7' => [
                'title' => 'Final Review',
                'fields' => [
                    [
                        'name' => 'comments',
                        'label' => 'Additional Comments',
                        'type' => 'textarea',
                    ],
                ],
            ],

        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Child Intake Form (future-ready)
    |--------------------------------------------------------------------------
    */
    
    'child-intake' => [
        'title' => 'Child Intake Form',
        'steps' => 5,
        'pages' => [
            'page1' => [
                'title' => 'Child Info',
                'fields' => [
                    [
                        'name' => 'child_name',
                        'label' => 'Child Name',
                        'type' => 'text',
                        'required' => true,
                    ],
                ],
            ],
        ],
    ],

];
