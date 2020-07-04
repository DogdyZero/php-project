<?php
require '../libs/fpdf/fpdf.php';
include 'contentRelatorio.php';

class FactoryRelatorio{
    private $tituloRelatorio ;
    private $listaConteudo = array();

    public function setTituloRelatorio($titulo){
        $this->tituloRelatorio = $titulo;
    }

    public function addConteudo($titulo,$conteudo,$rodape){
        
        array_push($this->listaConteudo,new ContentRelatorio($titulo,$conteudo,$rodape));
    }

    private function utf($str){
		return iconv('UTF-8', 'windows-1252', $str);
    }
    private function preencherRelatorio(){
        $pdf=new FPDF();
        $pdf->AddPage();
        $pdf->SetXY(10, 20);
        $pdf->SetFont('Helvetica', 'B', 14);
        $pdf->Cell(65, 5, $this->utf($this->tituloRelatorio));
        $pdf->ln(); // pula 1 linha
        $pdf->SetLineWidth(0.5);
        $pdf->Line(10, 27, 200, 27);
        $pdf->ln();
        foreach($this->listaConteudo as $row){
            $pdf->SetLineWidth(0.2);
            $pdf->SetFont('Helvetica', '', 12);

            $pdf->Cell(0, 5, $this->utf($row->getCabecalho()));
            $pdf->ln(); // pula 1 linha
            
            $pdf->SetFont('Courier', '', 10);

            $stringConteudo ="";
            foreach($row->getConteudo() as $conteudo){
                $stringConteudo .= $conteudo ."\n";
            }
            $pdf->MultiCell(0, 5, $this->utf($stringConteudo),1,1);

            $pdf->Cell(0, 8 , $this->utf($row->getRodape()));
            $pdf->ln(15); // pula 1 linha


        }


        return $pdf;
    }
    public function gerarRelatorio(){
        $pdf = $this->preencherRelatorio();
        $pdf->Output();
    }
}

?>