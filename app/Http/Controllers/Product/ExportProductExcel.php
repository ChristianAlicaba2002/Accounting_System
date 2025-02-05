<?php

namespace App\Http\Controllers\Product;

use App\Http\Controllers\Controller;
use App\Infrastructure\Persistence\Eloquent\Product\ProductModel;
use Illuminate\Http\Request;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
use Barryvdh\DomPDF\Facade\Pdf;
use function PHPUnit\Framework\isEmpty;


class ExportProductExcel extends Controller
{
    //

    public function UserexportToExcel()
    {
        $users = ProductModel::all();

        // Check if there are any users
        if ($users->isEmpty()) {
            return redirect('/UserManagement')->with('failedToExport', 'No users found to export');
        }

        $spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();

        // Set headers
        $sheet->setCellValue('A1', 'ID');
        $sheet->setCellValue('B1', 'Product_Name');
        $sheet->setCellValue('C1', 'Category');
        $sheet->setCellValue('D1', 'Price');
        $sheet->setCellValue('E1', 'Stock');
        $sheet->setCellValue('F1', 'Admin_ID');
        $sheet->setCellValue('G1', 'Admin_User');
        $sheet->setCellValue('H1', 'Created At');
        $sheet->setCellValue('I1', 'Updated At');

        // Add data
        $row = 2;
        foreach ($users as $Ecommerce_users) {
            $sheet->setCellValue('A' . $row, $Ecommerce_users->productId);
            $sheet->setCellValue('B' . $row, $Ecommerce_users->productName);
            $sheet->setCellValue('C' . $row, $Ecommerce_users->category);
            $sheet->setCellValue('D' . $row, $Ecommerce_users->price);
            $sheet->setCellValue('E' . $row, $Ecommerce_users->stock);
            $sheet->setCellValue('F' . $row, $Ecommerce_users->adminId);
            $sheet->setCellValue('G' . $row, $Ecommerce_users->adminUser);
            $sheet->setCellValue('H' . $row, $Ecommerce_users->created_at);
            $sheet->setCellValue('I' . $row, $Ecommerce_users->updated_at);
            $row++;
        }

        $writer = new Xlsx($spreadsheet);

        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header('Content-Disposition: attachment;filename="Accounting_Category.xlsx"');
        header('Cache-Control: max-age=0');

        $writer->save('php://output');
        exit();
    }

    // public function exportPDF()
    // {
    //     try {
    //         $users = User::all();

    //         if ($users->isEmpty()) {
    //             return redirect('/UserManagement')->with('failedToExport', 'No users found to Download to PDF');
    //         }

    //         $pdf = PDF::loadView('components/superAdmin/pages/users-pdf', ['users' => $users]);
    //         return $pdf->download('users.pdf');
    //     } catch (\Exception $e) {
    //         return redirect()
    //             ->back()
    //             ->with('failedToExport', 'Failed to export PDF: ' . $e->getMessage());
    //     }
    // }
}
