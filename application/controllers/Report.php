<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

require 'vendor/autoload.php';

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
use PhpOffice\PhpSpreadsheet\Style\Color;
use PhpOffice\PhpSpreadsheet\Style\Fill;
use PhpOffice\PhpSpreadsheet\Style\Alignment;
use PhpOffice\PhpSpreadsheet\Style\Border;

class Report extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->library(array('session'));
        $this->load->library('form_validation');
        $this->load->helper(array('url'));

        //load the login model
        $this->load->model('jointBodies_model');
        $this->load->model('state_model');
        $this->load->model('badanGabungan_model');
        $this->load->model('events_model');
        $this->load->model('allowanceSettings_model');

        $this->jompay = $this->load->database('default', TRUE);

        if (!isset($_SESSION['login'])) {
            redirect(base_url());
        }
    }

    public function Allowance() {

        $year = $this->input->get('year');
        if(empty($year))
        {
            $year = date('Y');
        }

        // General data
        $data['settings_allowance'] = $this->allowanceSettings_model->get_by_year($year);
        $data['event_list'] = $this->events_model->get_list_for_allowance($year);
        $data['state_list'] = $this->badanGabungan_model->get_list();
        $data['selectYear'] = $year;
        // echo '<pre>'; print_r($data); die();
        $this->load->view('allowance', $data);
    }

    public function Allowance_settings() {

        $year = $this->input->post('year_allowance');
        $mileage_allowance = $this->input->post('mileage_allowance');
        $food_allowance = $this->input->post('food_allowance');
        $accommodation_allowance = $this->input->post('accommodation_allowance');

        // General process
        $settings_allowance = $this->allowanceSettings_model->get_by_year($year);
        if(!empty($settings_allowance)) {
            $this->allowanceSettings_model->update($year, $mileage_allowance, $food_allowance, $accommodation_allowance);
        } else {
            $this->allowanceSettings_model->insert($year, $mileage_allowance, $food_allowance, $accommodation_allowance);
        }
        
        redirect('/report/allowance');
    }

    public function Create_allowance() {

        $selected_year = $this->input->post('selected_year');
        $selected_bg = $this->input->post('selected_bg');
        $selected_events = $this->input->post('selected_events');
        // echo '<pre>'; print_r($selected_events); die();
        // General data
        $data['event_list'] = $this->events_model->get_list_for_allowance_report($selected_year, $selected_bg, $selected_events);
        // $data['selectYear'] = $selected_year;
        // echo '<pre>'; print_r($data); die();
        $this->load->view('allowance_table', $data);
    }

    function Generate_allowance_report($data = array(), $filename = 'report.xlsx') {

        $selected_year = $this->input->post('selected_year');
        $selected_bg = $this->input->post('selected_bg');
        $selected_events = $this->input->post('selected_events');

        // Get data
        $settings_allowance = $this->allowanceSettings_model->get_by_year($selected_year);
        $data = $this->events_model->get_list_for_allowance_report($selected_year, $selected_bg, $selected_events);
        
        // Create a new Spreadsheet object
        $spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();
    
        // Set title to the spreadsheet
        $sheet->setCellValue('A1', "Bil");
        $sheet->setCellValue('B1', "Aktiviti");
        $sheet->setCellValue('C1', "Bilangan Penyertaan yang Diluluskan");
        $sheet->setCellValue('D1', "Bilangan Peserta Hadir\n(A)");
        $sheet->setCellValue('E1', "Bil. Pemandu\n(a)");
        $sheet->setCellValue('F1', "KM\n(B)");
        $sheet->setCellValue('G1', "sen/km\n(C)");
        $sheet->setCellValue('H1', "Perkiraan Mileage\n((A+a) x B x C)\n(D)");
        $sheet->setCellValue('I1', "Bil. Hari\n(E)");
        $sheet->setCellValue('J1', "Elaun Makan\nRM/hari\n(F)");
        $sheet->setCellValue('K1', "Jumlah Elaun\n((A+a) x E x F)\n(G)");
        $sheet->setCellValue('L1', "Bil. Malam\n(H)");
        $sheet->setCellValue('M1', "Elaun Penginapan\nRM/malam\n(I)");
        $sheet->setCellValue('N1', "Jumlah Elaun Penginapan\n((A+a) x H x I)\n(J)");
        $sheet->setCellValue('O1', "Subsidi Tambang Kapal Terbang\n(K)");
        $sheet->setCellValue('P1', "Jumlah Subsidi Kapal Terbang\n(A x K)\n(L)");
        $sheet->setCellValue('Q1', "Tolak Pendahuluan\n(M)");
        $sheet->setCellValue('R1', "Jumlah Bantuan\n(D + G + J + L - M)");
        // echo '<pre>'; print_r($data); die();
        // Add data to the spreadsheet
        $row = 2;
        $num = 1;
        foreach ($data as $rowData) {
            $sheet->setCellValue("A" . $row, $num);
            $sheet->setCellValue("B" . $row, $rowData->event_name . "\n" . $rowData->date_from . " - " . $rowData->date_to);
            $sheet->setCellValue("C" . $row, $rowData->num_of_players);
            $sheet->setCellValue("D" . $row, $rowData->num_of_players);
            $sheet->setCellValue("E" . $row, 0);
            $sheet->setCellValue("F" . $row, 0);
            $sheet->setCellValue("G" . $row, $settings_allowance->mileage_allowance);
            $sheet->setCellValue("H" . $row, '=((D' . $row . ' + E' . $row . ') * F' . $row . ') * G' . $row . ')');
            $sheet->setCellValue("I" . $row, $rowData->number_of_days);
            $sheet->setCellValue("J" . $row, $settings_allowance->food_allowance);
            $sheet->setCellValue("K" . $row, '=((D' . $row . ' + E' . $row . ') * I' . $row . ') * J' . $row . ')');
            $sheet->setCellValue("L" . $row, $rowData->number_of_nights);
            $sheet->setCellValue("M" . $row, $settings_allowance->accommodation_allowance);
            $sheet->setCellValue("N" . $row, '=((D' . $row . ' + E' . $row . ') * L' . $row . ') * M' . $row . ')');
            $sheet->setCellValue("O" . $row, 0);
            $sheet->setCellValue("P" . $row, '=(D' . $row . ' * O' . $row . ')');
            $sheet->setCellValue("Q" . $row, 0);
            $sheet->setCellValue("R" . $row, '=((H' . $row . ' + K' . $row . ' + N' . $row . ' + P' . $row . ') - Q' . $row .')');

            $row++;
            $num++;
        }

        // Set value for grand total
        $sheet->setCellValue("R" . $row, '=sum(R2:R' . ($row-1) . ')');
        $sheet->setCellValue('A'. $row, 'Jumlah BESAR');
        $sheet->getStyle('A'. $row)->getFont()->setBold(true);
        $sheet->getStyle('R'. $row)->getFont()->setBold(true);
        $sheet->getStyle('A'. $row)->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);
        $sheet->mergeCells('A'. $row.':Q'. $row);

        // Enable text wrapping to display line breaks correctly
        $sheet->getStyle('A1:R1')->getAlignment()->setWrapText(true);
        $sheet->getStyle('B2:B'.$num)->getAlignment()->setWrapText(true);

        // Center the text horizontally in cell A1
        $sheet->getStyle('1:1')->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);

        // Set the background color gray
        $sheet->getStyle('A1:E1')->getFill()->setFillType(Fill::FILL_SOLID)->getStartColor()->setARGB('C0C0C0');
        $sheet->getStyle('R1:R1')->getFill()->setFillType(Fill::FILL_SOLID)->getStartColor()->setARGB('C0C0C0');
        $sheet->getStyle('A'. $row.':R'. $row)->getFill()->setFillType(Fill::FILL_SOLID)->getStartColor()->setARGB('C0C0C0');
        
        // Set the background color yellow
        $sheet->getStyle('D2:D'.$num)->getFill()->setFillType(Fill::FILL_SOLID)->getStartColor()->setARGB(Color::COLOR_YELLOW);
        $sheet->getStyle('F1:F'.$num)->getFill()->setFillType(Fill::FILL_SOLID)->getStartColor()->setARGB(Color::COLOR_YELLOW);
        $sheet->getStyle('G1:G'.$num)->getFill()->setFillType(Fill::FILL_SOLID)->getStartColor()->setARGB(Color::COLOR_YELLOW);
        $sheet->getStyle('H1:H'.$num)->getFill()->setFillType(Fill::FILL_SOLID)->getStartColor()->setARGB(Color::COLOR_YELLOW);
    
        // Set the background color green
        $sheet->getStyle('I1:I'.$num)->getFill()->setFillType(Fill::FILL_SOLID)->getStartColor()->setARGB(Color::COLOR_GREEN);
        $sheet->getStyle('J1:J'.$num)->getFill()->setFillType(Fill::FILL_SOLID)->getStartColor()->setARGB(Color::COLOR_GREEN);
        $sheet->getStyle('K1:K'.$num)->getFill()->setFillType(Fill::FILL_SOLID)->getStartColor()->setARGB(Color::COLOR_GREEN);

        // Set the background color blue
        $sheet->getStyle('L1:L'.$num)->getFill()->setFillType(Fill::FILL_SOLID)->getStartColor()->setARGB('ADD8E6');
        $sheet->getStyle('M1:M'.$num)->getFill()->setFillType(Fill::FILL_SOLID)->getStartColor()->setARGB('ADD8E6');
        $sheet->getStyle('N1:N'.$num)->getFill()->setFillType(Fill::FILL_SOLID)->getStartColor()->setARGB('ADD8E6');

        // Set the background color orange
        $sheet->getStyle('O1:O'.$num)->getFill()->setFillType(Fill::FILL_SOLID)->getStartColor()->setARGB('FFDAB9');
        $sheet->getStyle('P1:P'.$num)->getFill()->setFillType(Fill::FILL_SOLID)->getStartColor()->setARGB('FFDAB9');

        // Set the background color red
        $sheet->getStyle('Q1:Q'.$num)->getFill()->setFillType(Fill::FILL_SOLID)->getStartColor()->setARGB('FFCCCB');

        // Set black border
        $highestRow = $sheet->getHighestRow();
        $highestColumn = $sheet->getHighestColumn();

        for ($row = 1; $row <= $highestRow; $row++) {
            for ($col = 'A'; $col <= $highestColumn; $col++) {
                $cell = $sheet->getCell($col . $row);
                if ($cell->getValue() !== null && $cell->getValue() !== '') {
                    $sheet->getStyle($col . $row)->applyFromArray([
                        'borders' => [
                            'allBorders' => [
                                'borderStyle' => Border::BORDER_THIN,
                                'color' => ['argb' => Color::COLOR_BLACK],
                            ],
                        ],
                    ]);
                }
            }
        }

        // Write the spreadsheet to a file
        $writer = new Xlsx($spreadsheet);
        $filePath = __DIR__ . '/' . $filename;
        $writer->save($filePath);
    
        // return $filePath;
        // Output file to the browser for download
        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header('Content-Disposition: attachment; filename="' . basename($filePath) . '"');
        header('Content-Length: ' . filesize($filePath));
        readfile($filePath);
        exit;
    }
}
