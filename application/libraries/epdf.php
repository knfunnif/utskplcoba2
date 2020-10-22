<?php defined('BASEPATH') or die('No direct script access allowed');
require_once('assets/dompdf/autoload.inc.php');

use Dompdf\Dompdf;

class Epdf
{
    protected $ci1;

    public function __construct()
    {
        $this->ci = &get_instance();
    }

    public function generate_proyek($view, $data = array(), $filename = 'Laporan Anggaran Proyek', $paper = 'A4', $orientation = 'potrait')
    {
        $dompdf = new Dompdf();
        $html = $this->ci->load->view($view, $data, TRUE);
        $html = mb_convert_encoding($html, 'HTML-ENTITIES', 'UTF-8');
        $dompdf->loadHtml($html);
        $dompdf->setPaper($paper, $orientation);
        $dompdf->render();
        $dompdf->stream($filename . ".pdf", array("Attachment" => 0));
    }

    public function generate_submasuk($view, $data = array(), $filename = 'Laporan Pemasukan Proyek', $paper = 'A4', $orientation = 'potrait')
    {
        $dompdf = new Dompdf();
        $html = $this->ci->load->view($view, $data, TRUE);
        $html = mb_convert_encoding($html, 'HTML-ENTITIES', 'UTF-8');
        $dompdf->loadHtml($html);
        $dompdf->setPaper($paper, $orientation);
        $dompdf->render();
        $dompdf->stream($filename . ".pdf", array("Attachment" => 0));
    }

    public function generate_keluar_kantor($view, $data = array(), $filename = 'Laporan Pengeluaran Kantor', $paper = 'A4', $orientation = 'potrait')
    {
        $dompdf = new Dompdf();
        $html = $this->ci->load->view($view, $data, TRUE);
        $html = mb_convert_encoding($html, 'HTML-ENTITIES', 'UTF-8');
        $dompdf->loadHtml($html);
        $dompdf->setPaper($paper, $orientation);
        $dompdf->render();
        $dompdf->stream($filename . ".pdf", array("Attachment" => 0));
    }

    public function generate_keluar_proyek($view, $data = array(), $filename = 'Laporan Pengeluaran Proyek', $paper = 'A4', $orientation = 'potrait')
    {
        $dompdf = new Dompdf();
        $html = $this->ci->load->view($view, $data, TRUE);
        $html = mb_convert_encoding($html, 'HTML-ENTITIES', 'UTF-8');
        $dompdf->loadHtml($html);
        $dompdf->setPaper($paper, $orientation);
        $dompdf->render();
        $dompdf->stream($filename . ".pdf", array("Attachment" => 0));
    }

    public function generate_rekap($view, $data = array(), $filename = 'Laporan Rekapitulasi', $paper = 'A4', $orientation = 'potrait')
    {
        $dompdf = new Dompdf();
        $html = $this->ci->load->view($view, $data, TRUE);
        $html = mb_convert_encoding($html, 'HTML-ENTITIES', 'UTF-8');
        $dompdf->loadHtml($html);
        $dompdf->setPaper($paper, $orientation);
        $dompdf->render();
        $dompdf->stream($filename . ".pdf", array("Attachment" => 0));
    }
}
