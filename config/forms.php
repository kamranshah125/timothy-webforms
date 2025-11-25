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
                            ['name' => 'first_name', 'label' => 'First Name', 'type' => 'text', 'required' => true],
                            ['name' => 'middle_name', 'label' => 'Middle Name', 'type' => 'text'],
                            ['name' => 'last_name', 'label' => 'Last Name', 'type' => 'text', 'required' => true],

                            ['name' => 'birth_date', 'label' => 'Birth Date', 'type' => 'date', 'required' => true],
                            ['name' => 'birth_order', 'label' => 'Birth Order', 'type' => 'text'],
                            ['name' => 'birth_gender', 'label' => 'Birth Gender', 'type' => 'text'],

                            ['name' => 'blood_type', 'label' => 'Blood Type', 'type' => 'text'],
                            ['name' => 'height_feet', 'label' => 'Height (Feet)', 'type' => 'number'],
                            ['name' => 'height_inches', 'label' => 'Height (Inches)', 'type' => 'number'],
                            ['name' => 'weight_pounds', 'label' => 'Weight (Pounds)', 'type' => 'number'],

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

                ],
            ],


            'page6' => [
                'title' => 'Tactile & Olfactory Function',
                'description' => 'Read each item and select the option that best describes you.',
                'sections' => [

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

                    // ------------------------------------------------------
                    // OLFACTORY HYPERSENSITIVE — 10 items
                    // ------------------------------------------------------
                    [
                        'title' => 'Olfactory Function — Hypersensitive Symptoms',
                        'fields' => [

                            ['name' => 'olfactory_hyper_1', 'label' => '1. Am bothered by strong smells', 'type' => 'radio-score', 'options' => NF_OPTIONS_SCORE],
                            ['name' => 'olfactory_hyper_2', 'label' => '2. Avoid certain places because of odors', 'type' => 'radio-score', 'options' => NF_OPTIONS_SCORE],
                            ['name' => 'olfactory_hyper_3', 'label' => '3. Get headaches from fragrances', 'type' => 'radio-score', 'options' => NF_OPTIONS_SCORE],
                            ['name' => 'olfactory_hyper_4', 'label' => '4. Become nauseous from certain scents', 'type' => 'radio-score', 'options' => NF_OPTIONS_SCORE],
                            ['name' => 'olfactory_hyper_5', 'label' => '5. Notice smells others do not', 'type' => 'radio-score', 'options' => NF_OPTIONS_SCORE],
                            ['name' => 'olfactory_hyper_6', 'label' => '6. Am overly bothered by cleaning supplies or chemicals', 'type' => 'radio-score', 'options' => NF_OPTIONS_SCORE],
                            ['name' => 'olfactory_hyper_7', 'label' => '7. Dislike certain foods because of smell', 'type' => 'radio-score', 'options' => NF_OPTIONS_SCORE],
                            ['name' => 'olfactory_hyper_8', 'label' => '8. Become anxious in smelly environments', 'type' => 'radio-score', 'options' => NF_OPTIONS_SCORE],
                            ['name' => 'olfactory_hyper_9', 'label' => '9. Am overwhelmed by perfumes or colognes', 'type' => 'radio-score', 'options' => NF_OPTIONS_SCORE],
                            ['name' => 'olfactory_hyper_10', 'label' => '10. React strongly to even mild odors', 'type' => 'radio-score', 'options' => NF_OPTIONS_SCORE],

                        ],
                    ],

                ],
            ],

            'page7' => [
                'title' => 'Emotional, Behavioral, Cognitive & Immune Function',
                'description' => 'Read each item and select the option that best describes you.',
                'sections' => [

                    // ----------------------------------------------------------
                    // EMOTIONAL FUNCTION CHECKLIST — 10 items
                    // ----------------------------------------------------------
                    [
                        'title' => 'Emotional Function Checklist',
                        'fields' => [

                            ['name' => 'emotional_1', 'label' => '1. Have mood swings', 'type' => 'radio-score', 'options' => NF_OPTIONS_SCORE],
                            ['name' => 'emotional_2', 'label' => '2. Become easily frustrated', 'type' => 'radio-score', 'options' => NF_OPTIONS_SCORE],
                            ['name' => 'emotional_3', 'label' => '3. Feel anxious frequently', 'type' => 'radio-score', 'options' => NF_OPTIONS_SCORE],
                            ['name' => 'emotional_4', 'label' => '4. Experience sudden anger outbursts', 'type' => 'radio-score', 'options' => NF_OPTIONS_SCORE],
                            ['name' => 'emotional_5', 'label' => '5. Have difficulty calming down', 'type' => 'radio-score', 'options' => NF_OPTIONS_SCORE],
                            ['name' => 'emotional_6', 'label' => '6. Feel overwhelmed easily', 'type' => 'radio-score', 'options' => NF_OPTIONS_SCORE],
                            ['name' => 'emotional_7', 'label' => '7. Cry easily or unexpectedly', 'type' => 'radio-score', 'options' => NF_OPTIONS_SCORE],
                            ['name' => 'emotional_8', 'label' => '8. Feel sad or depressed often', 'type' => 'radio-score', 'options' => NF_OPTIONS_SCORE],
                            ['name' => 'emotional_9', 'label' => '9. Have difficulty expressing emotions', 'type' => 'radio-score', 'options' => NF_OPTIONS_SCORE],
                            ['name' => 'emotional_10', 'label' => '10. Feel emotionally unstable', 'type' => 'radio-score', 'options' => NF_OPTIONS_SCORE],

                        ],
                    ],

                    // ----------------------------------------------------------
                    // BEHAVIORAL FUNCTION CHECKLIST — 10 items
                    // ----------------------------------------------------------
                    [
                        'title' => 'Behavioral Function Checklist',
                        'fields' => [

                            ['name' => 'behavioral_1', 'label' => '1. Act impulsively', 'type' => 'radio-score', 'options' => NF_OPTIONS_SCORE],
                            ['name' => 'behavioral_2', 'label' => '2. Have difficulty following rules', 'type' => 'radio-score', 'options' => NF_OPTIONS_SCORE],
                            ['name' => 'behavioral_3', 'label' => '3. Become aggressive when upset', 'type' => 'radio-score', 'options' => NF_OPTIONS_SCORE],
                            ['name' => 'behavioral_4', 'label' => '4. Engage in repetitive behaviors', 'type' => 'radio-score', 'options' => NF_OPTIONS_SCORE],
                            ['name' => 'behavioral_5', 'label' => '5. Have difficulty completing tasks', 'type' => 'radio-score', 'options' => NF_OPTIONS_SCORE],
                            ['name' => 'behavioral_6', 'label' => '6. Interrupt or talk excessively', 'type' => 'radio-score', 'options' => NF_OPTIONS_SCORE],
                            ['name' => 'behavioral_7', 'label' => '7. Become easily distracted', 'type' => 'radio-score', 'options' => NF_OPTIONS_SCORE],
                            ['name' => 'behavioral_8', 'label' => '8. Engage in self-stimulatory behaviors', 'type' => 'radio-score', 'options' => NF_OPTIONS_SCORE],
                            ['name' => 'behavioral_9', 'label' => '9. Have difficulty sitting still', 'type' => 'radio-score', 'options' => NF_OPTIONS_SCORE],
                            ['name' => 'behavioral_10', 'label' => '10. Have explosive reactions', 'type' => 'radio-score', 'options' => NF_OPTIONS_SCORE],

                        ],
                    ],

                    // ----------------------------------------------------------
                    // ACADEMIC / COGNITIVE FUNCTION CHECKLIST — 10 items
                    // ----------------------------------------------------------
                    [
                        'title' => 'Academic / Cognitive Function Checklist',
                        'fields' => [

                            ['name' => 'cognitive_1', 'label' => '1. Have difficulty focusing', 'type' => 'radio-score', 'options' => NF_OPTIONS_SCORE],
                            ['name' => 'cognitive_2', 'label' => '2. Struggle with memory', 'type' => 'radio-score', 'options' => NF_OPTIONS_SCORE],
                            ['name' => 'cognitive_3', 'label' => '3. Have trouble organizing tasks', 'type' => 'radio-score', 'options' => NF_OPTIONS_SCORE],
                            ['name' => 'cognitive_4', 'label' => '4. Struggle to follow directions', 'type' => 'radio-score', 'options' => NF_OPTIONS_SCORE],
                            ['name' => 'cognitive_5', 'label' => '5. Difficulty with problem solving', 'type' => 'radio-score', 'options' => NF_OPTIONS_SCORE],
                            ['name' => 'cognitive_6', 'label' => '6. Learn more slowly than peers', 'type' => 'radio-score', 'options' => NF_OPTIONS_SCORE],
                            ['name' => 'cognitive_7', 'label' => '7. Need instructions repeated often', 'type' => 'radio-score', 'options' => NF_OPTIONS_SCORE],
                            ['name' => 'cognitive_8', 'label' => '8. Make careless mistakes', 'type' => 'radio-score', 'options' => NF_OPTIONS_SCORE],
                            ['name' => 'cognitive_9', 'label' => '9. Have difficulty understanding new concepts', 'type' => 'radio-score', 'options' => NF_OPTIONS_SCORE],
                            ['name' => 'cognitive_10', 'label' => '10. Forget tasks or lose items frequently', 'type' => 'radio-score', 'options' => NF_OPTIONS_SCORE],

                        ],
                    ],

                    // ----------------------------------------------------------
                    // IMMUNE / AUTONOMIC FUNCTION CHECKLIST — 10 items
                    // ----------------------------------------------------------
                    [
                        'title' => 'Immune & Autonomic Function Checklist',
                        'fields' => [

                            ['name' => 'immune_auto_1', 'label' => '1. Experience chronic fatigue', 'type' => 'radio-score', 'options' => NF_OPTIONS_SCORE],
                            ['name' => 'immune_auto_2', 'label' => '2. Experience frequent colds or illnesses', 'type' => 'radio-score', 'options' => NF_OPTIONS_SCORE],
                            ['name' => 'immune_auto_3', 'label' => '3. Have irregular sweating', 'type' => 'radio-score', 'options' => NF_OPTIONS_SCORE],
                            ['name' => 'immune_auto_4', 'label' => '4. Experience cold hands or feet', 'type' => 'radio-score', 'options' => NF_OPTIONS_SCORE],
                            ['name' => 'immune_auto_5', 'label' => '5. Have food sensitivities', 'type' => 'radio-score', 'options' => NF_OPTIONS_SCORE],
                            ['name' => 'immune_auto_6', 'label' => '6. Have digestive issues', 'type' => 'radio-score', 'options' => NF_OPTIONS_SCORE],
                            ['name' => 'immune_auto_7', 'label' => '7. Experience asthma or breathing issues', 'type' => 'radio-score', 'options' => NF_OPTIONS_SCORE],
                            ['name' => 'immune_auto_8', 'label' => '8. Have autoimmune symptoms', 'type' => 'radio-score', 'options' => NF_OPTIONS_SCORE],
                            ['name' => 'immune_auto_9', 'label' => '9. Experience rapid heartbeat or palpitations', 'type' => 'radio-score', 'options' => NF_OPTIONS_SCORE],
                            ['name' => 'immune_auto_10', 'label' => '10. Experience dizziness upon standing', 'type' => 'radio-score', 'options' => NF_OPTIONS_SCORE],

                        ],
                    ],

                ],
            ],
 

        ], // end pages

    ], // end adult-intake

];
