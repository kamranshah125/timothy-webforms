<?php

namespace App\Services;

class FormScoreService
{
    /**
     * Calculate section-wise and total scores based on user responses.
     *
     * @param  array  $data
     * @return array
     */
    public function calculate(array $data): array
    {
        $map = [
            "Doesn't Apply" => 0,
            "Mild" => 1,
            "Mild to Moderate" => 2,
            "Moderate" => 3,
            "Moderate to Severe" => 4,
            "Severe" => 5,
        ];

        $scores = [];

        foreach ($data as $section => $answers) {
            $sectionTotal = 0;

            // If it's a checkbox section → count selected options
            if (is_array($answers)) {
                foreach ($answers as $key => $value) {
                    // If multiple answers (checkboxes)
                    if (is_array($value)) {
                        $sectionTotal += count($value);
                    } 
                    // If radio type (single selection with value)
                    else {
                        $sectionTotal += $map[$value] ?? 0;
                    }
                }
            }

            $scores[$section] = $sectionTotal;
        }

        return $scores;
    }
}
