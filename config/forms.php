<?php

if (!defined('NF_OPTIONS_SCORE')) {
    define('NF_OPTIONS_SCORE', [
        0 => "Doesn't Apply",
        1 => "Mild",
        2 => "Mild to Moderate",
        3 => "Moderate",
        4 => "Moderate to Severe",
        5 => "Severe",
    ]);
}

return [

    'adult-intake' => [

        'title' => 'NeuroFit Adult Intake Form',
        'steps' => 7,

        'pages' => [


            'page1' => [
                'title' => 'Personal Information',
                'description' => 'Please enter your personal details.',
                'sections' => [ 
                    // -----------------------------
                    // SECTION: PERSONAL DETAILS
                    // -----------------------------
                    [
                        'title' => 'PERSONAL DETAILS',
                        'fields' => [
                            ['name' => 'first_name', 'label' => 'First Name', 'type' => 'text', 'required' => true,],
                            ['name' => 'middle_name', 'label' => 'Middle Name', 'type' => 'text'],
                            ['name' => 'last_name', 'label' => 'Last Name', 'type' => 'text', 'required' => true],

                            ['name' => 'birth_date', 'label' => 'Birth Date', 'type' => 'date', 'required' => true],
                            ['name' => 'birth_order', 'label' => 'Birth Order', 'type' => 'text'],
                            ['name' => 'birth_gender', 'label' => 'Birth Gender', 'type' => 'text'],

                            ['name' => 'blood_type', 'label' => 'Blood Type', 'type' => 'text'],
                            ['name' => 'height_feet', 'label' => 'Height (Feet)', 'type' => 'number'],
                            
                            ['name' => 'diagnosis', 'label' => 'Diagnosis', 'type' => 'textarea'],

                            ['name' => 'email', 'label' => 'Email Address', 'type' => 'email', 'required' => true],
                            ['name' => 'phone', 'label' => 'Mobile Phone', 'type' => 'text'],
                        ],
                    ],

                    // -----------------------------
                    // SECTION: HOME ADDRESS
                    // -----------------------------
                    [
                        'title' => 'HOME ADDRESS',
                        'fields' => [
                            ['name' => 'address_line1', 'label' => 'Address Line 1', 'type' => 'text'],
                            ['name' => 'address_line2', 'label' => 'Address Line 2', 'type' => 'text'],
                            ['name' => 'city', 'label' => 'City', 'type' => 'text'],
                            ['name' => 'state', 'label' => 'State', 'type' => 'text'],
                            ['name' => 'zip', 'label' => 'Zip Code', 'type' => 'text'],
                            ['name' => 'country', 'label' => 'Country', 'type' => 'text'],
                        ],
                    ],

                    // -----------------------------
                    // SECTION: ABOUT YOU
                    // -----------------------------
                    [
                        'title' => 'ABOUT YOU',
                        'fields' => [

                            [
                                'name' => 'how_did_you_hear',
                                'label' => 'How did you hear about us?',
                                'type' => 'radio',
                                'options' => [
                                    'google' => 'Google search',
                                    'social' => 'Social media',
                                    'doctor' => "Doctor's office",
                                    'referred' => 'Referred by someone',
                                    'other' => 'Other',
                                ],
                            ],

                            [
                                'name' => 'special_categories',
                                'label' => 'Are you any of the following?',
                                'type' => 'checkbox-group',
                                'options' => [
                                    'first_responder' => 'A first responder (Police, Firefighter, EMT, etc.)',
                                    'military' => 'Current or former military',
                                    'medical_staff' => 'Current or former medical staff (Doctor, Nurse, etc.)',
                                    'teacher' => 'A teacher (Public, Private, or Homeschool)',
                                    'with_family_member' => 'Doing program with a family member',
                                ],
                            ],

                        ],
                    ],

                ],
            ],


            'page2' => [
                'title' => 'History',
                'description' => 'Please answer the following history questions as accurately as possible.',
                'sections' => [

                    // ------------------------------------------------
                    // SECTION: FORMAL DIAGNOSIS & COMPLAINTS
                    // ------------------------------------------------
                    [
                        'title' => 'Medical History & Complaints',
                        'fields' => [
                            ['name' => 'formal_diagnosis', 'label' => '1. Formal diagnosis?', 'type' => 'textarea'],

                            [
                                'name' => 'chief_complaints',
                                'label' => '2. Chief complaints in order of importance (1–5)',
                                'type' => 'repeat-group',
                                'count' => 5,
                                'fields' => [
                                    ['name' => 'complaint', 'label' => 'Complaint', 'type' => 'text'],
                                ],
                            ],
                        ],
                    ],

                    // ------------------------------------------------
                    // SECTION: IMMUNE ISSUES
                    // ------------------------------------------------
                    [
                        'title' => 'Immune Issues',
                        'fields' => [
                            [
                                'name' => 'immune_issues',
                                'label' => '3. Any immune issues?',
                                'type' => 'checkbox-group',
                                'options' => [
                                    'none' => 'None',
                                    'eczema' => 'Eczema',
                                    'asthma' => 'Asthma',
                                    'infections' => 'Infections',
                                    'allergies' => 'Allergies',
                                    'other' => 'Other',
                                ],
                            ],
                            ['name' => 'immune_allergies_details', 'label' => 'If allergies, please specify', 'type' => 'text'],
                            ['name' => 'immune_other_details', 'label' => 'Other immune issue', 'type' => 'text'],
                        ],
                    ],

                    // ------------------------------------------------
                    // SECTION: SLEEP / SENSORY / PAIN / FOOD BEHAVIOR
                    // ------------------------------------------------
                    [
                        'title' => 'Sleep, Sensory & Food Behavior',
                        'fields' => [
                            ['name' => 'sleep_issues', 'label' => '4. Any sleeping issues?', 'type' => 'textarea'],
                            ['name' => 'sensory_issues', 'label' => '5. Any major sensory issues, hyper or hyposensitivities?', 'type' => 'textarea'],
                            ['name' => 'pain_feeling', 'label' => '6. Do you feel pain?', 'type' => 'textarea'],
                            ['name' => 'picky_eater', 'label' => '7. Are you a picky eater?', 'type' => 'textarea'],

                            [
                                'name' => 'food_preferences',
                                'label' => '8. Any food preferences?',
                                'type' => 'checkbox-group',
                                'options' => [
                                    'gluten_free' => 'Gluten free',
                                    'dairy_free' => 'Dairy free',
                                    'soy_free' => 'Soy free',
                                    'other' => 'Other',
                                ],
                            ],
                            ['name' => 'food_pref_other_details', 'label' => 'Other preference', 'type' => 'text'],

                            [
                                'name' => 'drink_preferences',
                                'label' => '9. What do you drink?',
                                'type' => 'checkbox-group',
                                'options' => [
                                    'dairy' => 'Dairy milk',
                                    'rice_milk' => 'Rice milk',
                                    'goat_milk' => 'Goat milk',
                                    'almond_milk' => 'Almond milk',
                                    'oat_milk' => 'Oat milk',
                                    'water' => 'Water',
                                    'other' => 'Other',
                                ],
                            ],
                            ['name' => 'drink_pref_other', 'label' => 'Other drink', 'type' => 'text'],
                        ],
                    ],

                    // ------------------------------------------------
                    // SECTION: SMELL / MOTOR / DOMINANCE / BALANCE etc.
                    // ------------------------------------------------
                    [
                        'title' => 'Sensory & Motor Skills',
                        'fields' => [
                            ['name' => 'sense_smell_taste', 'label' => '17. Do you have a sense of smell or taste?', 'type' => 'textarea'],
                            ['name' => 'muscle_tone', 'label' => '18. Any muscle tone or motor activity issues?', 'type' => 'textarea'],
                            ['name' => 'hand_foot_dominance', 'label' => '19. What is your hand/foot dominance?', 'type' => 'textarea'],
                            ['name' => 'balance_issues', 'label' => '20. Any obvious balance issues or motion sickness?', 'type' => 'textarea'],
                            ['name' => 'fear_of_heights', 'label' => '21. Are you afraid of high places?', 'type' => 'textarea'],
                            ['name' => 'spinning_behavior', 'label' => '22. Do you spin or get yourself dizzy?', 'type' => 'textarea'],
                            ['name' => 'stims_tics_ocd', 'label' => '23. Do you have any stims, tics, or OCD behaviors?', 'type' => 'textarea'],
                        ],
                    ],

                    // ------------------------------------------------
                    // SECTION: SKILLS
                    // ------------------------------------------------
                    [
                        'title' => 'Unusually Strong Skills',
                        'fields' => [
                            [
                                'name' => 'strong_skills',
                                'label' => '24. Any unusually strong skills?',
                                'type' => 'checkbox-group',
                                'options' => [
                                    'reading' => 'Reading',
                                    'mem_songs' => 'Memorizing songs',
                                    'memory_details' => 'Memory for details',
                                    'memory_locations' => 'Memory for locations',
                                    'other' => 'Other',
                                ],
                            ],
                            ['name' => 'strong_skills_other', 'label' => 'Other strong skill', 'type' => 'text'],
                        ],
                    ],

                    // ------------------------------------------------
                    // SECTION: WHAT HELPED & FINAL
                    // ------------------------------------------------
                    [
                        'title' => 'Additional Notes',
                        'fields' => [
                            ['name' => 'what_helped', 'label' => '44. What has been most effective in helping you?', 'type' => 'textarea'],
                            ['name' => 'anything_else', 'label' => '45. Is there anything else we should know?', 'type' => 'textarea'],
                        ],
                    ],

                ],
            ],

            'page3' => [
                'title' => 'Nutrition & Vestibular Function',
                'description' => 'Please answer the nutrition questions and complete the vestibular function checklist.',
                'sections' => [

                    // ------------------------------------------------
                    // SECTION: NUTRITION
                    // ------------------------------------------------
                    [
                        'title' => 'Nutrition',
                        'fields' => [

                            [
                                'name' => 'meals_before_breakfast',
                                'label' => 'Before Breakfast',
                                'type' => 'text',
                            ],
                            [
                                'name' => 'meals_breakfast',
                                'label' => 'Breakfast',
                                'type' => 'text',
                            ],
                            [
                                'name' => 'meals_midmorning',
                                'label' => 'Midmorning Snack',
                                'type' => 'text',
                            ],
                            [
                                'name' => 'meals_lunch',
                                'label' => 'Lunch',
                                'type' => 'text',
                            ],
                            [
                                'name' => 'meals_midafternoon',
                                'label' => 'Midafternoon Snack',
                                'type' => 'text',
                            ],
                            [
                                'name' => 'meals_dinner',
                                'label' => 'Dinner',
                                'type' => 'text',
                            ],
                            [
                                'name' => 'meals_dessert',
                                'label' => 'Dessert',
                                'type' => 'text',
                            ],
                            [
                                'name' => 'meals_before_bed',
                                'label' => 'Before Bedtime',
                                'type' => 'text',
                            ],

                            [
                                'name' => 'favorite_foods',
                                'label' => 'Your favorite foods',
                                'type' => 'textarea',
                            ],
                        ],
                    ],

                    // ------------------------------------------------
                    // SECTION: VESTIBULAR CHECKLIST (10 items)
                    // ------------------------------------------------
                    [
                        'title' => 'Vestibular Function Checklist',
                        'description' => 'Rate how each item describes you.',
                        'fields' => [

                            // 1
                            [
                                'name' => 'vestibular_1',
                                'label' => '1. Exhibit poor balance',
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

                            // 2
                            [
                                'name' => 'vestibular_2',
                                'label' => '2. Had delayed crawling, standing, or walking',
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

                            // 3
                            [
                                'name' => 'vestibular_3',
                                'label' => '3. Poor muscle tone (extremely flexible)',
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

                            // 4
                            [
                                'name' => 'vestibular_4',
                                'label' => '4. Experience motion sickness',
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

                            // 5
                            [
                                'name' => 'vestibular_5',
                                'label' => '5. Dislike heights, swings, carousels, escalators, elevators',
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

                            // 6
                            [
                                'name' => 'vestibular_6',
                                'label' => '6. Easily disoriented / poor sense of direction',
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

                            // 7
                            [
                                'name' => 'vestibular_7',
                                'label' => '7. Am clumsy',
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

                            // 8
                            [
                                'name' => 'vestibular_8',
                                'label' => '8. Difficulty remaining still; seek movement (spinning, rocking)',
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

                            // 9
                            [
                                'name' => 'vestibular_9',
                                'label' => '9. Difficulty with space perception (sea/car-sickness)',
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

                            // 10
                            [
                                'name' => 'vestibular_10',
                                'label' => '10. Walk or walked on toes',
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

                ],
            ],

            'page4' => [
                'title' => 'Auditory & Visual Function',
                'description' => 'Read each item and select the option that best describes you.',
                'sections' => [

                    // ------------------------------------------------
                    // SECTION 1 — AUDITORY FUNCTION CHECKLIST
                    // ------------------------------------------------
                    [
                        'title' => 'Auditory Function Checklist',
                        'fields' => [

                            [
                                'name' => 'auditory_1',
                                'label' => '1. Was concerned about hearing as an infant',
                                'type' => 'radio-score',
                                'options' => NF_OPTIONS_SCORE,
                            ],
                            [
                                'name' => 'auditory_2',
                                'label' => '2. Am unable to sing in tune',
                                'type' => 'radio-score',
                                'options' => NF_OPTIONS_SCORE,
                            ],
                            [
                                'name' => 'auditory_3',
                                'label' => '3. Am hypersensitive to sounds',
                                'type' => 'radio-score',
                                'options' => NF_OPTIONS_SCORE,
                            ],
                            [
                                'name' => 'auditory_4',
                                'label' => '4. Misinterpret questions',
                                'type' => 'radio-score',
                                'options' => NF_OPTIONS_SCORE,
                            ],
                            [
                                'name' => 'auditory_5',
                                'label' => '5. Confuse similar sounding words; frequently need words repeated',
                                'type' => 'radio-score',
                                'options' => NF_OPTIONS_SCORE,
                            ],
                            [
                                'name' => 'auditory_6',
                                'label' => '6. Am unable to follow sequential instructions',
                                'type' => 'radio-score',
                                'options' => NF_OPTIONS_SCORE,
                            ],
                            [
                                'name' => 'auditory_7',
                                'label' => '7. Have a flat and monotonous voice',
                                'type' => 'radio-score',
                                'options' => NF_OPTIONS_SCORE,
                            ],
                            [
                                'name' => 'auditory_8',
                                'label' => '8. Have hesitant speech',
                                'type' => 'radio-score',
                                'options' => NF_OPTIONS_SCORE,
                            ],
                            [
                                'name' => 'auditory_9',
                                'label' => '9. Have a small vocabulary',
                                'type' => 'radio-score',
                                'options' => NF_OPTIONS_SCORE,
                            ],
                            [
                                'name' => 'auditory_10',
                                'label' => '10. Often confuse or reverse letters when listening',
                                'type' => 'radio-score',
                                'options' => NF_OPTIONS_SCORE,
                            ],
                        ],
                    ],

                    // ------------------------------------------------
                    // SECTION 2 — VISUAL / READING CHECKLIST
                    // ------------------------------------------------
                    [
                        'title' => 'Visual & Reading Function Checklist',
                        'fields' => [

                            [
                                'name' => 'visual_1',
                                'label' => '1. Misread words',
                                'type' => 'radio-score',
                                'options' => NF_OPTIONS_SCORE,
                            ],
                            [
                                'name' => 'visual_2',
                                'label' => '2. Miss or repeat words or lines',
                                'type' => 'radio-score',
                                'options' => NF_OPTIONS_SCORE,
                            ],
                            [
                                'name' => 'visual_3',
                                'label' => '3. Read slowly',
                                'type' => 'radio-score',
                                'options' => NF_OPTIONS_SCORE,
                            ],
                            [
                                'name' => 'visual_4',
                                'label' => '4. Need to use a finger or marker as a pointer',
                                'type' => 'radio-score',
                                'options' => NF_OPTIONS_SCORE,
                            ],
                            [
                                'name' => 'visual_5',
                                'label' => '5. Inability to remember what was read',
                                'type' => 'radio-score',
                                'options' => NF_OPTIONS_SCORE,
                            ],
                            [
                                'name' => 'visual_6',
                                'label' => '6. Poor concentration while reading',
                                'type' => 'radio-score',
                                'options' => NF_OPTIONS_SCORE,
                            ],
                            [
                                'name' => 'visual_7',
                                'label' => '7. Poor focus (letters move or jump on page)',
                                'type' => 'radio-score',
                                'options' => NF_OPTIONS_SCORE,
                            ],
                            [
                                'name' => 'visual_8',
                                'label' => '8. Crooked or sloped handwriting',
                                'type' => 'radio-score',
                                'options' => NF_OPTIONS_SCORE,
                            ],
                            [
                                'name' => 'visual_9',
                                'label' => '9. Letters appear unbalanced with one eye covered or when reading sideways',
                                'type' => 'radio-score',
                                'options' => NF_OPTIONS_SCORE,
                            ],
                            [
                                'name' => 'visual_10',
                                'label' => '10. Am sensitive to light',
                                'type' => 'radio-score',
                                'options' => NF_OPTIONS_SCORE,
                            ],
                        ],
                    ],

                ],
            ],

            'page5' => [
                'title' => 'Proprioceptive & Tactile Function',
                'description' => 'Read each item and select the option that best describes you.',
                'sections' => [

                    // -----------------------------------------------
                    // PROPRIOCEPTIVE FUNCTION CHECKLIST (10 items)
                    // -----------------------------------------------
                    [
                        'title' => 'Proprioceptive Function Checklist',
                        'fields' => [

                            ['name' => 'proprio_1', 'label' => '1. Have poor posture', 'type' => 'radio-score', 'options' => NF_OPTIONS_SCORE],
                            ['name' => 'proprio_2', 'label' => '2. Constantly fidget or move', 'type' => 'radio-score', 'options' => NF_OPTIONS_SCORE],
                            ['name' => 'proprio_3', 'label' => '3. Have an excessive desire to be held', 'type' => 'radio-score', 'options' => NF_OPTIONS_SCORE],
                            ['name' => 'proprio_4', 'label' => '4. Provoke fights', 'type' => 'radio-score', 'options' => NF_OPTIONS_SCORE],
                            ['name' => 'proprio_5', 'label' => '5. Hook feet around legs of desk or chair', 'type' => 'radio-score', 'options' => NF_OPTIONS_SCORE],
                            ['name' => 'proprio_6', 'label' => '6. Have a problem identifying body parts in space', 'type' => 'radio-score', 'options' => NF_OPTIONS_SCORE],
                            ['name' => 'proprio_7', 'label' => '7. Bump into things often', 'type' => 'radio-score', 'options' => NF_OPTIONS_SCORE],
                            ['name' => 'proprio_8', 'label' => '8. Have poor balance', 'type' => 'radio-score', 'options' => NF_OPTIONS_SCORE],
                            ['name' => 'proprio_9', 'label' => '9. Rock my body or bang my head', 'type' => 'radio-score', 'options' => NF_OPTIONS_SCORE],
                            ['name' => 'proprio_10', 'label' => '10. Do not like heights', 'type' => 'radio-score', 'options' => NF_OPTIONS_SCORE],

                        ],
                    ],

                    // ------------------------------------------------
                    // TACTILE HYPOTACTILE (OVERSENSITIVITY) — 10 items
                    // ------------------------------------------------
                    [
                        'title' => 'TACTILE FUNCTION - HYPOTACTILE (OVERSENSITIVITY) SYMPTOMS ',
                        'fields' => [

                            ['name' => 'hypotactile_1', 'label' => '1. Am oversensitive to most things', 'type' => 'radio-score', 'options' => NF_OPTIONS_SCORE],
                            ['name' => 'hypotactile_2', 'label' => '2. Don’t notice or respond when cut', 'type' => 'radio-score', 'options' => NF_OPTIONS_SCORE],
                            ['name' => 'hypotactile_3', 'label' => '3. Have a high threshold for pain', 'type' => 'radio-score', 'options' => NF_OPTIONS_SCORE],
                            ['name' => 'hypotactile_4', 'label' => '4. Don’t sense the feeling of cold or hot', 'type' => 'radio-score', 'options' => NF_OPTIONS_SCORE],
                            ['name' => 'hypotactile_5', 'label' => '5. Crave contact sports', 'type' => 'radio-score', 'options' => NF_OPTIONS_SCORE],
                            ['name' => 'hypotactile_6', 'label' => '6. Don’t notice when I sit down on an object', 'type' => 'radio-score', 'options' => NF_OPTIONS_SCORE],
                            ['name' => 'hypotactile_7', 'label' => '7. Provoke roughhousing or fighting', 'type' => 'radio-score', 'options' => NF_OPTIONS_SCORE],
                            ['name' => 'hypotactile_8', 'label' => '8. Am not ticklish', 'type' => 'radio-score', 'options' => NF_OPTIONS_SCORE],
                            ['name' => 'hypotactile_9', 'label' => '9. Compulsively touch things', 'type' => 'radio-score', 'options' => NF_OPTIONS_SCORE],
                            ['name' => 'hypotactile_10', 'label' => '10. Act like a bull in a China shop', 'type' => 'radio-score', 'options' => NF_OPTIONS_SCORE],

                        ],
                    ],


                    // ------------------------------------------------------
                    // TACTILE HYPERTACTILE (UNDERSENSITIVE) — 10 items
                    // ------------------------------------------------------
                    [
                        'title' => 'Tactile Function - Hypertactile (Undersensitive) Symptoms',
                        'fields' => [

                            ['name' => 'hypertactile_1', 'label' => '1. Am bothered by clothing textures (tags, seams, fabrics)', 'type' => 'radio-score', 'options' => NF_OPTIONS_SCORE],
                            ['name' => 'hypertactile_2', 'label' => '2. Hate being touched unexpectedly', 'type' => 'radio-score', 'options' => NF_OPTIONS_SCORE],
                            ['name' => 'hypertactile_3', 'label' => '3. Avoid crowds or close contact', 'type' => 'radio-score', 'options' => NF_OPTIONS_SCORE],
                            ['name' => 'hypertactile_4', 'label' => '4. Am irritated by grooming (haircuts, nails, brushing)', 'type' => 'radio-score', 'options' => NF_OPTIONS_SCORE],
                            ['name' => 'hypertactile_5', 'label' => '5. Dislike certain food textures', 'type' => 'radio-score', 'options' => NF_OPTIONS_SCORE],
                            ['name' => 'hypertactile_6', 'label' => '6. Dislike walking barefoot (grass, carpet, sand)', 'type' => 'radio-score', 'options' => NF_OPTIONS_SCORE],
                            ['name' => 'hypertactile_7', 'label' => '7. Am startled easily when touched', 'type' => 'radio-score', 'options' => NF_OPTIONS_SCORE],
                            ['name' => 'hypertactile_8', 'label' => '8. Prefer loose or very tight clothing only', 'type' => 'radio-score', 'options' => NF_OPTIONS_SCORE],
                            ['name' => 'hypertactile_9', 'label' => '9. Avoid hugs or physical contact', 'type' => 'radio-score', 'options' => NF_OPTIONS_SCORE],
                            ['name' => 'hypertactile_10', 'label' => '10. Am sensitive to vibration or light touch', 'type' => 'radio-score', 'options' => NF_OPTIONS_SCORE],

                        ],
                    ],

                ],
            ],


            'page6' => [
                'title' => ' Olfactory Function Checklist ',
                'description' => 'Read each item and select the option that best describes you.',
                'sections' => [
                    // ------------------------------------------------------
                    // OLFACTORY HYPERSENSITIVE — 10 items
                    // ------------------------------------------------------
                    [
                        'title' => 'Olfactory Function — Hypersensitive Smell and Taste Checklist',
                        'fields' => [

                            ['name' => 'olfactory_hyper_1', 'label' => '1. Exhibit an increased sensitivity to taste and smell', 'type' => 'radio-score', 'options' => NF_OPTIONS_SCORE],
                            ['name' => 'olfactory_hyper_2', 'label' => '2. Gag at the smell of certain foods', 'type' => 'radio-score', 'options' => NF_OPTIONS_SCORE],
                            ['name' => 'olfactory_hyper_3', 'label' => '3. Avoid going to bathroom because the smell is repugnant', 'type' => 'radio-score', 'options' => NF_OPTIONS_SCORE],
                            ['name' => 'olfactory_hyper_4', 'label' => '4. Prefer bland foods', 'type' => 'radio-score', 'options' => NF_OPTIONS_SCORE],
                            ['name' => 'olfactory_hyper_5', 'label' => '5. Avoid people with dirty or smelly clothes', 'type' => 'radio-score', 'options' => NF_OPTIONS_SCORE],
                            ['name' => 'olfactory_hyper_6', 'label' => '6. Complain about others’ bad breath', 'type' => 'radio-score', 'options' => NF_OPTIONS_SCORE],
                            ['name' => 'olfactory_hyper_7', 'label' => '7. Misbehave or complain after house is cleaned with solvents', 'type' => 'radio-score', 'options' => NF_OPTIONS_SCORE],
                            ['name' => 'olfactory_hyper_8', 'label' => '8. Am sensitive to smoke', 'type' => 'radio-score', 'options' => NF_OPTIONS_SCORE],
                            ['name' => 'olfactory_hyper_9', 'label' => '9. Avoid foods and places with strong cooking smells', 'type' => 'radio-score', 'options' => NF_OPTIONS_SCORE],
                            ['name' => 'olfactory_hyper_10', 'label' => '10. Sniff everything', 'type' => 'radio-score', 'options' => NF_OPTIONS_SCORE],

                        ],
                    ],


                    // -----------------------------
                    // HYPOSENSITIVE SMELL SYMPTOMS
                    // -----------------------------
                    [
                        'title' => 'Hyposensitive Smell Checklist',
                        'fields' => [

                            ['name' => 'olfactory_hypo_1', 'label' => '1. Never comment on strong smells', 'type' => 'radio-score', 'options' => NF_OPTIONS_SCORE],
                            ['name' => 'olfactory_hypo_2', 'label' => '2. Never notice baking smells, such as cookies', 'type' => 'radio-score', 'options' => NF_OPTIONS_SCORE],
                            ['name' => 'olfactory_hypo_3', 'label' => '3. Overfill mouth', 'type' => 'radio-score', 'options' => NF_OPTIONS_SCORE],
                            ['name' => 'olfactory_hypo_4', 'label' => '4. Avoid food because of the way it looks', 'type' => 'radio-score', 'options' => NF_OPTIONS_SCORE],
                            ['name' => 'olfactory_hypo_5', 'label' => '5. Never sniff', 'type' => 'radio-score', 'options' => NF_OPTIONS_SCORE],
                            ['name' => 'olfactory_hypo_6', 'label' => '6. Hate to eat, even sweets', 'type' => 'radio-score', 'options' => NF_OPTIONS_SCORE],
                            ['name' => 'olfactory_hypo_7', 'label' => '7. Chew on objects like pens', 'type' => 'radio-score', 'options' => NF_OPTIONS_SCORE],
                            ['name' => 'olfactory_hypo_8', 'label' => '8. Do not notice strong smells, like something burning', 'type' => 'radio-score', 'options' => NF_OPTIONS_SCORE],
                            ['name' => 'olfactory_hypo_9', 'label' => '9. Eat indiscriminately; will reach for anything', 'type' => 'radio-score', 'options' => NF_OPTIONS_SCORE],
                            ['name' => 'olfactory_hypo_10', 'label' => '10. Am an extremely picky eater', 'type' => 'radio-score', 'options' => NF_OPTIONS_SCORE],

                        ],
                    ],

                ],
            ],

            'page7' => [
                'title' => 'MOTOR RIGHT AND LEFT-BRAIN CHARACTERISTICS & SENSORY RIGHT AND LEFT-BRAIN CHARACTERISTICS & Emotional Right and Left-Brain Characteristics',
                'description' => 'The following checklists help pinpoint the right and left-brain characteristics.  Place a checkmark next to 
                    each of the characteristics that apply.',

                'sections' => [
                    // RIGHT-BRAIN DELAY
                    [
                        'title' => 'Motor Characteristics of a Right-Brain Delay',
                        'fields' => [
                            [
                                'name' => 'motor_right_brain_delay',
                                'label' => 'Select all that apply',
                                'type' => 'checkbox-group',
                                'options' => [
                                    'clumsy_odd_posture' => 'Am clumsy and have an odd posture',
                                    'poor_coordination' => 'Have poor coordination',
                                    'not_athletic' => 'Am not athletically inclined and have no interest in popular participation sports',
                                    'low_muscle_tone' => 'Have low muscle tone – muscles seem kind of floppy',
                                    'poor_gross_motor_skills' => 'Have poor gross motor skills, such as riding a bike and/or running and/or walking oddly',
                                    'stereotyped_motor_mannerisms' => 'Have poor repetitive/stereotyped motor mannerisms (spin in circles, flaps)',
                                    'fidget_excessively' => 'Fidget excessively',
                                    'poor_eye_contact' => 'Have poor eye contact',
                                    'toe_walking' => 'Walk or walked on toes',
                                ],
                            ],
                        ],
                    ],
                    [
                        'title' => 'Motor Characteristics of a Left-Brain Delay',
                        'fields' => [
                            [
                                'name' => 'motor_left_brain_delay',
                                'label' => 'Select all that apply',
                                'type' => 'checkbox-group',
                                'options' => [
                                    'fine_motor_problems' => 'Have fine motor problems (poor or slow handwriting)',
                                    'dyspraxia_fine_motor_skills' => 'Have difficulty with fine motor skills (dyspraxia), such as buttoning a shirt',
                                    'poor_hand_grip' => 'Have poor or immature hand grip when writing',
                                    'write_very_large' => 'Tend to write very large',
                                    'stumble_words_when_tired' => 'Stumble over words when fatigued',
                                    'delayed_crawling_standing_walking' => 'Exhibited delay in crawling, standing, and/or walking',
                                    'love_sports_good_at_them' => 'Love sports and am good at them',
                                    'good_muscle_tone' => 'Have good muscle tone',
                                    'poor_drawing_skills' => 'Have poor drawing skills',
                                    'difficulty_playing_music' => 'Have difficulty learning to play music',
                                    'mechanical_interest' => 'Likes to fix things with my hands and am interested in anything mechanical',
                                    'difficulty_planning_movements' => 'Have difficulty planning and coordinating body movements',
                                ],
                            ],
                        ],
                    ],


                    // ----------------------------------------------------
                    // SENSORY CHARACTERISTICS OF A RIGHT-BRAIN DELAY
                    // ----------------------------------------------------
                    [
                        'title' => 'Sensory Characteristics of a Right-Brain Delay',
                        'fields' => [
                            [
                                'name' => 'sensory_right_brain_delay',
                                'label' => 'Select all that apply',
                                'type' => 'checkbox-group',
                                'options' => [
                                    'poor_spatial_orientation' => 'Have poor spatial orientation – bump into things often',
                                    'sensitive_to_sound' => 'Am sensitive to sound',
                                    'confusion_body_parts' => 'Have confusion pointing to different body parts when asked',
                                    'poor_sense_of_balance' => 'Have a poor sense of balance',
                                    'high_threshold_for_pain' => 'Have a high threshold for pain',
                                    'like_motion_activities' => 'Like to spin, go on rides, swing, etc. – anything with motion',
                                    'touch_things_compulsively' => 'Touch things compulsively',
                                    'uninterested_makeup_jewelry' => 'I am uninterested in makeup or jewelry',
                                    'do_not_like_clothing_arms_legs' => 'Do not like the feel of clothing on arms or legs',
                                    'dont_like_being_touched' => 'Don’t like being touched and don’t like to touch things',
                                    'incessantly_smell_everything' => 'Incessantly smell everything',
                                    'prefer_bland_food' => 'Prefer bland food',
                                    'do_not_notice_strong_smells' => 'Do not notice strong smells, such as burning wood, popcorn, cookies',
                                    'avoid_food_looks' => 'Avoid food because of the way it looks',
                                    'hate_having_to_eat' => 'Hate having to eat and am not even interested in sweets',
                                    'extremely_picky_eater' => 'Am an extremely picky eater',
                                ],
                            ],
                        ],
                    ],

                    // ----------------------------------------------------
                    // SENSORY CHARACTERISTICS OF A LEFT-BRAIN DELAY
                    // ----------------------------------------------------
                    [
                        'title' => 'Sensory Characteristics of a Left-Brain Delay',
                        'fields' => [
                            [
                                'name' => 'sensory_left_brain_delay',
                                'label' => 'Select all that apply',
                                'type' => 'checkbox-group',
                                'options' => [
                                    'no_sensory_issues' => 'Don’t seem to have many sensory “issues” or problems',
                                    'good_spatial_awareness' => 'Have good spatial awareness',
                                    'good_sense_of_balance' => 'Have a good sense of balance',
                                    'eat_anything' => 'Eat just about anything',
                                    'normal_taste_smell' => 'Have a normal to above average sense of taste and smell',
                                    'like_to_be_touched' => 'Like to be touched',
                                    'not_sensitive_to_clothing' => 'Am not sensitive to clothing',
                                    'poor_auditory_processing' => 'Have poor auditory or central processing',
                                    'delay_speaking_ear_infections' => 'Had a delay in speaking that was attributed to ear infections',
                                    'motion_sickness' => 'Get motion sick and have other motion sickness issues',
                                    'not_under_or_oversensitive' => 'Am not under-sensitive or oversensitive',
                                ],
                            ],
                        ],
                    ],




                    // ----------------------------------------------------
                    // EMOTIONAL SYMPTOMS OF A RIGHT-BRAIN DEFICIENCY
                    // ----------------------------------------------------
                    [
                        'title' => 'Emotional Symptoms of a Right-Brain Deficiency',
                        'fields' => [
                            [
                                'name' => 'emotional_right_brain_deficiency',
                                'label' => 'Select all that apply',
                                'type' => 'checkbox-group',
                                'options' => [
                                    'spontaneous_cry_laugh_outbursts' =>
                                    'Spontaneously cry and/or laugh and have sudden outbursts of anger or fear.',
                                    'worry_a_lot_phobias' =>
                                    'Worry a lot and tend to have phobias of many things',
                                    'hold_onto_past_hurts' =>
                                    'Hold onto past “hurts”',
                                    'sudden_emotional_outbursts' =>
                                    'May have sudden emotional outbursts that appear over-reactive, and inappropriate',
                                    'panic_anxiety_attacks' =>
                                    'Experience panic and/or anxiety attacks',
                                    'dark_or_violent_thoughts' =>
                                    'Sometime display dark or violent thoughts',
                                    'lack_expression_body_language' =>
                                    'Have a face that lacks expression; don’t exhibit much body language',
                                    'lack_empathy' =>
                                    'Lack empathy',
                                    'lack_emotional_reciprocity' =>
                                    'Lack emotional reciprocity',
                                    'fearless_risk_taker' =>
                                    'Am fearless, a dangerous risk taker',
                                ],
                            ],
                        ],
                    ],

                    // ----------------------------------------------------
                    // EMOTIONAL SYMPTOMS OF A LEFT-BRAIN DEFICIENCY
                    // ----------------------------------------------------
                    [
                        'title' => 'Emotional Symptoms of a Left-Brain Deficiency',
                        'fields' => [
                            [
                                'name' => 'emotional_left_brain_deficiency',
                                'label' => 'Select all that apply',
                                'type' => 'checkbox-group',
                                'options' => [
                                    'overly_happy_affectionate' =>
                                    'Am overly happy and affectionate; love to hug and kiss',
                                    'moody_irritable_depressed' =>
                                    'Am frequently moody and irritable, depressed',
                                    'love_new_things_bored_easily' =>
                                    'Love doing new or different things but get bored easily',
                                    'lack_motivation' =>
                                    'Lack motivation',
                                    'withdrawn_shy' =>
                                    'Am withdrawn and shy',
                                    'excessively_cautious_negative' =>
                                    'Am excessively cautious or pessimistic and am extremely negative',
                                    'no_pleasure_in_life' =>
                                    'Don’t seem to get any pleasure out of life',
                                    'socially_withdrawn' =>
                                    'Am socially withdrawn',
                                    'motion_sickness_issues' =>
                                    'Get motion sick and have other motion sickness issues',
                                    'cry_easily_feelings_hurt' =>
                                    'Cry easily; feelings get hurt easily',
                                    'in_touch_with_feelings' =>
                                    'Seem to be in touch with own feelings',
                                    'empathetic_read_emotions' =>
                                    'Am empathetic to other people’s feelings; read people’s emotions well',
                                    'embarrassed_easily' =>
                                    'Get embarrassed easily',
                                    'sensitive_to_others_opinions' =>
                                    'Am very sensitive to what others think about me',
                                ],
                            ],
                        ],
                    ],


                    // ------------------------------------------------------------
                    // BEHAVIORAL CHARACTERISTICS OF A RIGHT-BRAIN DELAY
                    // ------------------------------------------------------------
                    [
                        'title' => 'Behavioral Characteristics of a Right-Brain Delay',
                        'fields' => [
                            [
                                'name' => 'behavioral_right_brain_delay',
                                'label' => 'Select all that apply',
                                'type' => 'checkbox-group',
                                'options' => [

                                    'think_analytically_all_the_time' =>
                                    'Think analytically all the time',
                                    'miss_the_gist' =>
                                    'Often miss the gist of the story',
                                    'last_to_get_joke' =>
                                    'Am always the last to get the joke',
                                    'stuck_in_behavior' =>
                                    'Get stuck in set behavior; can’t let it go',
                                    'lack_social_tact' =>
                                    'Lack social tact and/or am antisocial and/or socially isolated',
                                    'poor_time_management' =>
                                    'Have poor time management; am always late',
                                    'disorganized' =>
                                    'Disorganized',
                                    'problems_paying_attention' =>
                                    'Have problems paying attention',
                                    'hyperactive_impulsive' =>
                                    'Am hyperactive and/or impulsive',
                                    'obsessive_thoughts_behavior' =>
                                    'Have obsessive thoughts or behavior',
                                    'argue_uncooperative' =>
                                    'Argue all the time and am generally uncooperative',
                                    'eating_disorder_signs' =>
                                    'Exhibit signs of an eating disorder',
                                    'failed_to_thrive' =>
                                    'Failed to thrive as an infant',
                                    'echolalia' =>
                                    'Have Echolalia (mimicking of sounds or words repeatedly without really understanding the meaning)',
                                    'bored_aloof_abrupt' =>
                                    'Appear bored, aloof, and abrupt',
                                    'considered_strange' =>
                                    'Am considered strange by others',
                                    'inability_form_friendships' =>
                                    'Have an inability to form friendships',
                                    'inability_share_enjoyment' =>
                                    'Have an inability to share enjoyment, interests, or achievements with other people',
                                    'inappropriately_giddy_silly' =>
                                    'Act inappropriately giddy or silly',
                                    'one_sided_interactions' =>
                                    'Have one-sided social interactions (do not listen or care what another person is saying)',
                                    'talk_incessantly_repetitive_questions' =>
                                    'Talk incessantly and ask repetitive questions',
                                    'little_joint_attention' =>
                                    'No or little joint attention (pointing to object to get another’s attention)',
                                    'did_not_look_in_mirror' =>
                                    'Didn’t look at myself in the mirror when younger',

                                ],
                            ],
                        ],
                    ],

                    // ------------------------------------------------------------
                    // BEHAVIORAL CHARACTERISTICS OF A LEFT-BRAIN DELAY
                    // ------------------------------------------------------------
                    [
                        'title' => 'Behavioral Characteristics of a Left-Brain Delay',
                        'fields' => [
                            [
                                'name' => 'behavioral_left_brain_delay',
                                'label' => 'Select all that apply',
                                'type' => 'checkbox-group',
                                'options' => [

                                    'procrastinate' =>
                                    'Procrastinate',
                                    'extremely_shy' =>
                                    'Am extremely shy, especially around strangers',
                                    'good_balance' =>
                                    'Have a good sense of balance',
                                    'good_nonverbal_communication' =>
                                    'Am very good at nonverbal communications',
                                    'well_liked' =>
                                    'Am well liked by other people',
                                    'no_behavior_problems' =>
                                    'Do not have any behavioral problems at school or work',
                                    'understand_social_rules' =>
                                    'Understand social rules',
                                    'poor_self_esteem' =>
                                    'Have poor self-esteem',
                                    'hate_homework' =>
                                    'Hate doing homework',
                                    'good_social_interaction' =>
                                    'Am very good at social interaction',
                                    'good_eye_contact' =>
                                    'Make good eye contact',
                                    'like_people_parties' =>
                                    'Like to be around people and enjoy going to parties',
                                    'dont_like_sleepovers' =>
                                    'Don’t like to go to sleep-overs or campouts with others',
                                    'not_good_with_routines' =>
                                    'Am not good at following routines',
                                    'cant_follow_multiple_steps' =>
                                    'Can’t follow multiple-step directions',
                                    'in_touch_with_feelings' =>
                                    'Am very in touch with my own feelings',
                                    'jump_to_conclusions' =>
                                    'Jump to conclusions',

                                ],
                            ],
                        ],
                    ],




                    // ------------------------------------------------------------
                    // ACADEMIC CHARACTERISTICS OF A RIGHT-BRAIN DEFICIENCY
                    // ------------------------------------------------------------
                    [
                        'title' => 'Academic Characteristics of a Right-Brain Deficiency',
                        'fields' => [
                            [
                                'name' => 'academic_right_brain_deficiency',
                                'label' => 'Select all that apply',
                                'type' => 'checkbox-group',
                                'options' => [
                                    'poor_math_reasoning' => 'Have poor math reasoning (word problems)',
                                    'poor_reading_comprehension' => 'Have poor reading comprehension and pragmatic skills',
                                    'issues_big_picture' => 'Have issues with the big picture',
                                    'very_analytical' =>
                                    'Am very analytical',
                                    'problems_understanding_jokes' =>
                                    'Have problems understanding jokes',
                                    'good_finding_mistakes' =>
                                    'Am very good at finding mistakes (spelling)',
                                    'very_literal' =>
                                    'Am very literal',
                                    'dont_reach_conclusions' =>
                                    'Don’t always reach conclusions when speaking',
                                    'early_speech_precociousness' =>
                                    'Had early speech precociousness (talked well early), even if slightly delayed',
                                    'iq_verbal_high_performance_low' =>
                                    'Have an IQ that falls in the above-normal range in verbal ability and in the below-average range in performance abilities',
                                    'early_word_reader' =>
                                    'Was an early word reader',
                                    'interested_unusual_topics' =>
                                    'Am interested in unusual topics',
                                    'learn_by_rote' =>
                                    'I learn in rote (memorizing) manner',
                                    'learn_extraordinary_facts' =>
                                    'I learn extraordinary amounts of specific facts about a subject',
                                    'impatient' =>
                                    'Am impatient',
                                    'speak_monotone' =>
                                    'I speak in monotones; little voice inflection',
                                    'poor_nonverbal_comm' =>
                                    'Am a poor nonverbal communicator',
                                    'dont_like_loud_noises' =>
                                    'Don’t like loud noises and complains that volume is too low',
                                    'speak_out_loud_thoughts' =>
                                    'Speak out loud regarding what I am thinking',
                                    'talk_in_others_face' =>
                                    'Talk “in another’s face” – am a space invader',
                                    'good_reader_but_not_enjoy' =>
                                    'Am a good reader but do not enjoy reading',
                                    'analytic_logic_led' =>
                                    'Am analytic; lead by logic',
                                    'follow_rules_without_question' =>
                                    'Follow rules without questioning them',
                                    'good_at_keeping_time' =>
                                    'Am good at keeping track of time',
                                    'easily_memorize_spelling_math' =>
                                    'Easily memorize spelling and mathematical formulas',
                                    'enjoy_observing' =>
                                    'Enjoy observing rather than participating',
                                    'read_manual_before_trying' =>
                                    'Would rather read an instruction manual before trying something new',
                                    'math_first_problematic_subject' =>
                                    'View math as my first problematic academic subject',
                                    'iq_verbal_high_performance_low_repeat' =>
                                    'IQ falls in the above-normal range in verbal ability and in the below-average range in performance ability',
                                    'early_word_reader_repeat' =>
                                    'Was an early word reader',

                                ],
                            ],
                        ],
                    ],

                    // ------------------------------------------------------------
                    // ACADEMIC CHARACTERISTICS OF A LEFT-BRAIN DEFICIENCY
                    // ------------------------------------------------------------
                    [
                        'title' => 'Academic Characteristics of a Left-Brain Deficiency',
                        'fields' => [
                            [
                                'name' => 'academic_left_brain_deficiency',
                                'label' => 'Select all that apply',
                                'type' => 'checkbox-group',
                                'options' => [

                                    'good_big_picture_skills' =>
                                    'Am very good at big picture skills',
                                    'good_abstract_association' =>
                                    'Am good at abstract “thought free” association',
                                    'poor_analytical_skills' =>
                                    'Have poor analytical skills',
                                    'very_visual' =>
                                    'Am very visual; love images and patterns',
                                    'question_rules' =>
                                    'Constantly question why someone is doing something or why rules exist',
                                    'no_sense_of_time' =>
                                    'Have no sense of time',
                                    'enjoy_touching_objects' =>
                                    'Enjoy touching and feeling actual objects',
                                    'trouble_prioritizing' =>
                                    'Have trouble prioritizing',
                                    'unlikely_read_manual' =>
                                    'Am unlikely to read instruction manual before trying something new',
                                    'naturally_creative' =>
                                    'Am naturally creative but need to apply myself to develop my potential',
                                    'prefer_doing_not_observing' =>
                                    'Would rather do things instead of observing',
                                    'good_voice_inflection' =>
                                    'Use good voice inflection when speaking',
                                    'misread_omit_words' =>
                                    'Misread or omit common small words',
                                    'stumble_through_long_words' =>
                                    'Stumble through loner words',
                                    'reading_slow_laborious' =>
                                    'Reading is too slow and laborious',
                                    'difficulty_naming' =>
                                    'Have difficulty naming colors, objects, and letters',
                                    'need_repetition' =>
                                    'Need to hear or see concepts many times in order to learn them',
                                    'downward_trend_performance' =>
                                    'Have shown a downward trend in achievement test scores or school performance',
                                    'inconsistent_work_product' =>
                                    'Have an inconsistent work product',
                                    'late_talker' =>
                                    'Started as a late talker',
                                    'difficulty_pronouncing_words' =>
                                    'Have difficulty pronouncing words (poor with phonics)',
                                    'difficulty_learning_alphabet' =>
                                    'Had difficulty learning the alphabet, nursery rhymes or songs when young',
                                    'difficulty_finishing_work' =>
                                    'Have difficulty finishing work or finishing a conversation',
                                    'act_before_thinking' =>
                                    'Act before thinking and make careless mistakes',
                                    'misread_repeat_words' =>
                                    'Tend to misread, omit, or repeat words; read slowly',
                                    'daydream_a_lot' =>
                                    'Daydream a lot',
                                    'difficulty_sequencing' =>
                                    'Have difficulty sequencing events in the proper order',
                                    'see_letters_backward' =>
                                    'Sometimes see letters written backward',
                                    'poor_basic_math' =>
                                    'Am poor at basic math operations',
                                    'poor_memorization_skills' =>
                                    'Have poor memorization skills',
                                    'poor_academic_ability' =>
                                    'Have/had poor academic ability',
                                    'low_verbal_high_nonverbal_iq' =>
                                    'Have/had a lower verbal higher nonverbal IQ test result',
                                    'perform_poorly_verbal_tests' =>
                                    'Perform poorly on verbal tests',
                                    'need_repetition_to_understand' =>
                                    'Need to be told things several times before I understand',
                                    'childhood_stutter' =>
                                    'Started to stutter as a child',
                                    'poor_test_taker' =>
                                    'Don’t read directions well and am a poor test taker (misinterprets questions)',

                                ],
                            ],
                        ],
                    ],


                    // ------------------------------------------------------------
                    // COMMON IMMUNE CHARACTERISTICS OF A RIGHT-BRAIN DELAY
                    // ------------------------------------------------------------
                    [
                        'title' => 'Common Immune Characteristics of a Right-Brain Delay',
                        'fields' => [
                            [
                                'name' => 'immune_right_brain_delay',
                                'label' => 'Select all that apply',
                                'type' => 'checkbox-group',
                                'options' => [

                                    'autoimmune_disorder' =>
                                    'Have or have had an auto-immune disorder such as asthma, eczema, lupus, psoriasis, or rheumatoid arthritis.',
                                    'multiple_autoimmune_disorders' =>
                                    'Have more than one auto-immune disorder',
                                    'rarely_get_infections' =>
                                    'Rarely get cold and infections',
                                    'white_bumps_on_skin' =>
                                    'Skin has little white bumps, especially on the back of the arms',
                                    'overactive_immune_response' =>
                                    'Tend to have an overactive immune response (has allergies)',
                                    'erratic_behavior' =>
                                    'Have erratic behavior – good one day, bad the next',
                                    'crave_dairy_wheat' =>
                                    'Crave certain food, especially dairy and wheat products',
                                    'low_thyroid_function' =>
                                    'Have been diagnosed with a low thyroid function',
                                    'feel_drunk_after_food' =>
                                    'Feel a little drunk or off-balance after eating certain foods',

                                ],
                            ],
                        ],
                    ],

                    // ------------------------------------------------------------
                    // COMMON IMMUNE CHARACTERISTICS OF A LEFT-BRAIN DELAY
                    // ------------------------------------------------------------
                    [
                        'title' => 'Common Immune Characteristics of a Left-Brain Delay',
                        'fields' => [
                            [
                                'name' => 'immune_left_brain_delay',
                                'label' => 'Select all that apply',
                                'type' => 'checkbox-group',
                                'options' => [

                                    'irregular_heartbeat' =>
                                    'Have or have had an irregular heartbeat (arrhythmia or heart murmur)',
                                    'chronic_ear_throat_resp_infections' =>
                                    'Have a problem with chronic ear, throat, or respiratory infections',
                                    'prone_tumors_cysts' =>
                                    'Are prone to benign tumors and/or cysts or have had a cancerous tumor',
                                    'frequent_antibiotics' =>
                                    'Have taken or frequently take a lot of antibiotics or anti-viral medicines.',
                                    'catch_many_colds' =>
                                    'Catch a lot of colds; more than 2 a year.',
                                    'slow_recovery_after_illness' =>
                                    'Take a long time to feel 100% after an illness',
                                    'chronic_yeast_fungal' =>
                                    'Have problem with chronic yeast or fungal infections and/or have been diagnosed with candidiasis or thrush',
                                    'stomach_ulcers' =>
                                    'Have or have had stomach ulcers',
                                    'pneumonia_last_7_years' =>
                                    'Have had pneumonia within the past 7 years',
                                    'recurrent_viral_outbreaks' =>
                                    'Have recurrent viral outbreaks, such as herpes or shingles',
                                    'lyme_disease' =>
                                    'Have had or still have Lyme disease',
                                    'tonsils_adenoids_removed' =>
                                    'Have had tonsils and adenoids removed because of chronic infections.',

                                ],
                            ],
                        ],
                    ],

                    // ------------------------------------------------------------
                    // COMMON METABOLIC CHARACTERISTICS OF A RIGHT-BRAIN DELAY
                    // ------------------------------------------------------------
                    [
                        'title' => 'Common Metabolic Characteristics of a Right-Brain Delay',
                        'fields' => [
                            [
                                'name' => 'metabolic_right_brain_delay',
                                'label' => 'Select all that apply',
                                'type' => 'checkbox-group',
                                'options' => [

                                    'bowel_problems' =>
                                    'Have problems with bowel function; constipation, diarrhea',
                                    'rapid_heart_rate' =>
                                    'Have a rapid heart rate or a sudden increase in heart rate (Tachycardia, above 90 beats/minute)',
                                    'bp_higher_right_arm' =>
                                    'Blood pressure is 10 points or more higher when taken on right arm compared to the left',
                                    'perspire_more_right_side' =>
                                    'Perspire more on the right side of the body than the left',

                                ],
                            ],
                        ],
                    ],

                    // ------------------------------------------------------------
                    // COMMON METABOLIC CHARACTERISTICS OF A LEFT-BRAIN DELAY
                    // ------------------------------------------------------------
                    [
                        'title' => 'Common Metabolic Characteristics of a Left-Brain Delay',
                        'fields' => [
                            [
                                'name' => 'metabolic_left_brain_delay',
                                'label' => 'Select all that apply',
                                'type' => 'checkbox-group',
                                'options' => [

                                    'perspire_more_left_side' =>
                                    'Perspire more on the left side of the body than the right',
                                    'bp_higher_left_arm' =>
                                    'Blood pressure is 10 points or more higher when taken on left arm compared to the right',
                                    'irregular_heartbeat' =>
                                    'Have or have had irregular heartbeats, such as arrhythmia or a heart murmur',
                                    'left_hand_circulation' =>
                                    'Left hand loses circulation and takes longer to warm up when exposed to the cold',

                                ],
                            ],
                        ],
                    ],

                ],
            ],


        ], // end pages

    ], // end adult-intake

];
