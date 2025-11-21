<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Adult Intake Form Structure
    |--------------------------------------------------------------------------
    */
    'adult-intake' => [

        'title' => 'NeuroFit Adult Intake Form',
        'steps' => 7,  // total pages  
        
        'pages' => [

            // PAGE 1: Identity + login starter (required: name+email)
            'page1' => [
                'title' => 'Personal & Contact Information',
                'description' => 'Please enter your name, email, and birthdate. Use an email you check — Save Progress will email you credentials.',
                'fields' => [

                    [
                        'name' => 'is_child',
                        'label' => 'Is this a child intake?',
                        'type' => 'radio',
                        'options' => [
                            'no' => 'No — Adult',
                            'yes' => 'Yes — Child',
                        ],
                        'required' => true,
                        'note' => 'Used to toggle wording on later pages (do you / does your child).',
                    ],

                    [
                        'name' => 'full_name',
                        'label' => 'Full Name',
                        'type' => 'text',
                        'required' => true,
                    ],

                    [
                        'name' => 'preferred_name',
                        'label' => 'Preferred Name (optional)',
                        'type' => 'text',
                        'required' => false,
                    ],

                    [
                        'name' => 'dob',
                        'label' => 'Date of Birth',
                        'type' => 'date',
                        'required' => true,
                    ],

                    [
                        'name' => 'email',
                        'label' => 'Email Address',
                        'type' => 'email',
                        'required' => true,
                    ],

                    [
                        'name' => 'phone',
                        'label' => 'Phone (optional)',
                        'type' => 'text',
                        'required' => false,
                    ],

                    [
                        'name' => 'address',
                        'label' => 'Address (street, city, state, zip)',
                        'type' => 'textarea',
                        'required' => false,
                    ],
                ],
            ],

            // PAGE 2: Medical / Diagnostic History
            'page2' => [
                'title' => 'Medical & Diagnostic History',
                'fields' => [

                    [
                        'name' => 'primary_diagnosis',
                        'label' => 'Primary Diagnosis (if any)',
                        'type' => 'textarea',
                        'required' => false,
                    ],

                    [
                        'name' => 'other_diagnoses',
                        'label' => 'Other Diagnoses (list)',
                        'type' => 'textarea',
                        'required' => false,
                    ],

                    [
                        'name' => 'medications',
                        'label' => 'Current Medications',
                        'type' => 'textarea',
                        'required' => false,
                    ],

                    [
                        'name' => 'allergies',
                        'label' => 'Allergies (if any)',
                        'type' => 'textarea',
                        'required' => false,
                    ],

                    [
                        'name' => 'surgeries',
                        'label' => 'Past Surgeries or hospitalizations',
                        'type' => 'textarea',
                        'required' => false,
                    ],
                ],
            ],

            // PAGE 3: Developmental / Lifestyle
            'page3' => [
                'title' => 'Developmental & Lifestyle',
                'fields' => [

                    [
                        'name' => 'pregnancy_notes',
                        'label' => 'Pregnancy / Birth history (if relevant)',
                        'type' => 'textarea',
                        'required' => false,
                    ],

                    [
                        'name' => 'school_work',
                        'label' => 'Current work / school situation',
                        'type' => 'textarea',
                        'required' => false,
                    ],

                    [
                        'name' => 'exercise',
                        'label' => 'Do you (or your child) exercise regularly?',
                        'type' => 'radio',
                        'options' => [
                            'yes' => 'Yes',
                            'no' => 'No',
                        ],
                        'required' => false,
                    ],

                    [
                        'name' => 'sleep_hours',
                        'label' => 'Average Sleep Hours Per Night',
                        'type' => 'number',
                        'required' => false,
                    ],
                ],
            ],

            // PAGE 4: Sensory Processing Survey (example group)
            'page4' => [
                'title' => 'Sensory Processing — Vestibular & Balance',
                'description' => 'For each item below choose the option that best describes the severity.',
                'fields' => [
                    // radio-score uses keys that are numeric strings (service maps values)
                    [
                        'name' => 'vestibular_balance',
                        'label' => 'Problems with balance or falling?',
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
                        'label' => 'Difficulty with motion (car rides, swings)?',
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
                        'name' => 'vestibular_vertigo',
                        'label' => 'Episodes of dizziness or vertigo?',
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

            // PAGE 5: Auditory / Visual Sensitivity Survey
            'page5' => [
                'title' => 'Sensory Processing — Auditory & Visual',
                'fields' => [

                    [
                        'name' => 'sound_sensitivity',
                        'label' => 'Sensitivity or distress to sounds?',
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
                        'name' => 'visual_sensitivity',
                        'label' => 'Sensitivity to bright lights or visual clutter?',
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
                        'name' => 'auditory_processing',
                        'label' => 'Difficulty processing speech in noisy environments?',
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

            // PAGE 6: Check-all-that-apply (symptoms/behavioral checklist)
            'page6' => [
                'title' => 'Symptoms — Check all that apply',
                'fields' => [
                    [
                        'name' => 'symptoms',
                        'label' => 'Select symptoms that apply',
                        'type' => 'checkbox-group',
                        'options' => [
                            'headaches' => 'Headaches',
                            'dizziness' => 'Dizziness',
                            'fatigue' => 'Fatigue',
                            'sleep_issues' => 'Sleep issues',
                            'concentration' => 'Difficulty concentrating',
                            'sensory_overload' => 'Sensory overload / meltdowns',
                            'motor_issues' => 'Coordination / motor planning issues',
                        ],
                    ],

                    [
                        'name' => 'symptom_duration',
                        'label' => 'How long have these symptoms been present?',
                        'type' => 'text',
                        'required' => false,
                    ],
                ],
            ],

            // PAGE 7: Final Review, consent, additional comments
            'page7' => [
                'title' => 'Review & Submit',
                'fields' => [
                    [
                        'name' => 'comments',
                        'label' => 'Additional comments (anything else we should know?)',
                        'type' => 'textarea',
                        'required' => false,
                    ],

                    [
                        'name' => 'consent',
                        'label' => 'I confirm the above information is correct and give permission to use it for assessment.',
                        'type' => 'checkbox-group',
                        'options' => [
                            'agree' => 'I agree',
                        ],
                        'required' => true,
                    ],
                ],
            ],

        ], // end pages


    ],

    /*
    |--------------------------------------------------------------------------
    | Child Intake Form (future-ready)
    |--------------------------------------------------------------------------
    */

    // 'child-intake' => [
    //     'title' => 'Child Intake Form',
    //     'steps' => 5,
    //     'pages' => [
    //         'page1' => [
    //             'title' => 'Child Info',
    //             'fields' => [
    //                 [
    //                     'name' => 'child_name',
    //                     'label' => 'Child Name',
    //                     'type' => 'text',
    //                     'required' => true,
    //                 ],
    //             ],
    //         ],
    //     ],
    // ],

];
