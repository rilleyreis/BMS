<?php
/**
 * Created by PhpStorm.
 * User: Rilley Reis
 * Date: 24/01/2018
 * Time: 12:20
 */

require '../../_lib/fpdf/fpdf.php';
define("FPDF_FONTPATH","font/");
require '../../database/config.php';
require '../../_class/Empresa.php';
require '../../_class/OrdemServico.php';
require '../../_class/Cliente.php';
require '../../_class/Usuario.php';
require '../../_class/Prod_Os.php';
require '../../_class/Serv_Os.php';

$pdf = new FPDF();
$empresa = new Empresa();
$temEmp = $empresa->buscaQtd($pdo);
if ($temEmp == 1) {
    $dadosEmp = $empresa->buscaDados($pdo);
    foreach ($dadosEmp as $item) {
        $cnpj_emp = $item['cnpj_emp'];
        $raz_emp = $item['raz_emp'];
        $fant_emp = $item['fant_emp'];
        $ie_emp = $item['ie_emp'];
        $rua_emp = $item['rua_emp'];
        $num_emp = $item['num_emp'];
        $bairro_emp = $item['bairro_emp'];
        $cid_emp = $item['cid_emp'];
        $est_emp = $item['est_emp'];
        $tel_emp = $item['tel_emp'];
        $email_emp = $item['email_emp'];
        $logo_emp = "../empresa/img/" . $item['logo_emp'];
    }
}
$id_os = base64_decode($_GET['print']);
$newOS = new OrdemServico();
$newOS->setId($id_os);

$dadosOS = $newOS->buscarDados($pdo);
foreach ($dadosOS as $dado) {
    $cliente = explode("|",$dado['cliente']);
    $tecnico = explode("|",$dado['tecnico']);
    $cli_os = $cliente[0];
    $tec_os = $tecnico[0];
    $status_os = $dado['status_os'];
    $dtIni_os = $dado['dtIni_os'];
    $dtFim_os = $dado['dtFim_os'];
    $gar_os = $dado['garant_os'];
    $desc_os = $dado['desc_os'];
    $def_os = $dado['deft_os'];
    $obs_os = $dado['obs_os'];
    $protocolo = $dado['prot_os'];
    $data_os = date("d/m/Y", strtotime($dado['data_os']));
}
$cliente = new Cliente();
$cliente->setCpf($cli_os);
$dadosCli = $cliente->buscaDados($pdo);
$nomeCli = "";
$contatoCli= "";
$emailCli = "";
$tecnico = new Usuario();
$tecnico->setId($tec_os);
$dadosTec = $tecnico->buscaDados($pdo);
$nomeTec = "";
$contatoTec = "";
$emailTec = "";
foreach ($dadosCli as $dado){
    $nomeCli = $dado['nome_cli'];
    $contatoCli = $dado['cel_cli'];
    $contatoCli .= $dado['tel_cli'] != "" ? " - ".$dado['tel_cli'] : "";
    $emailCli = $dado['email_cli'];
}
foreach ($dadosTec as $dado){
    $nomeTec = $dado['nome_user'];
    $contatoTec = $dado['cel_user'];
    $contatoTec .= $dado['tel_user'] != "" ? " - ".$dado['tel_user'] : "";
    $emailTec = $dado['email_user'];
}

$prodOs = new Prod_Os();
$prodOs->setOsOsp($id_os);
$qtdProd = $prodOs->buscaQTD($pdo);
$prods_exibir = "";
if($qtdProd > 0){
    $prods_exibir = $prodOs->buscarProds($pdo);
}
$servOs = new Serv_Os();
$servOs->setOsOss($id_os);
$qtdServ = $servOs->buscaQTD($pdo);
$servs_exibir = "";
if($qtdServ > 0){
    $servs_exibir = $servOs->buscarServs($pdo);
}

//Inicio PDF
$pdf->AddPage();
if ($temEmp == 1) {
    $pdf->Image($logo_emp, 5, 18, 45, 14, "jpeg");

    $pdf->SetXY(55, 10);
    $pdf->SetFont('Arial', 'B', 14);
    $pdf->Cell(0, 10, $fant_emp, "L", 0, "L");
    $pdf->Ln(8);
    $pdf->SetX(55);
    $pdf->SetFont('Arial', '', 8);
    $pdf->Cell(0, 5, "CNPJ: " . $cnpj_emp, "L", 0, "L");
    $pdf->Ln(4);
    $pdf->SetX(55);
    $pdf->Cell(0, 5, "Razao Social: " . $raz_emp, "L", 0, "L");
    $pdf->Ln(4);
    $pdf->SetX(55);
    $end = $rua_emp . ", " . $num_emp . " - " . $bairro_emp;
    $pdf->Cell(0, 5, "Rua: " . $end, "L", 0, "L");
    $pdf->Ln(4);
    $pdf->SetX(55);
    $pdf->Cell(0, 5, $cid_emp . " - " . $est_emp, "L", 0, "L");
    $pdf->Ln(4);
    $pdf->SetX(55);
    $pdf->Cell(0, 5, "Telefone: " . $tel_emp, "L", 0, "L");
    $pdf->Ln(4);
    $pdf->SetX(55);
    $pdf->Cell(0, 5, "Email: " . $email_emp, "L", 0, "L");
    $pdf->Ln(15);
}

$pdf->SetFont('Arial', 'B', 13);
$pdf->Cell(90, 10, "Protocolo: ".$protocolo, "", 0, 'L');
$pdf->SetFont('Arial', '', 11);
$pdf->Cell(0, 10, "Data Emissao: ".$data_os, "",0 , 'R');
$pdf->Ln(10);


$pdf->SetFont('Arial', 'B', 12);
$pdf->Cell(90, 5, "Dados Cliente", "TR", 0, "L");
$pdf->Cell(0, 5, "Dados do Tecnico", "T", 0, "L");
$pdf->Ln(4);
$pdf->SetFont('Arial', '', 11);
$pdf->Cell(90, 8, "Nome: ".$nomeCli, "R", 0, "L");
$pdf->Cell(0, 8, "Nome: ".$nomeTec, "", 0, "L");
$pdf->Ln(4);
$pdf->Cell(90, 8, "Contato: ".$contatoCli, "R", 0, "L");
$pdf->Cell(0, 8, "Contato: ".$contatoTec, "", 0, "L");
$pdf->Ln(4);
$pdf->Cell(90, 8, "Email: ".$emailCli, "RB", 0, "L");
$pdf->Cell(0, 8, "Email: ".$emailTec, "B", 0, "L");
$pdf->Ln(12);

$pdf->SetFont('Arial', 'B', 12);
$pdf->Cell(0, 4, "Descricao", "", 0, "L");
$pdf->Ln(4);
$pdf->SetFont('Arial', '', 11);
$pdf->MultiCell(0, 10, $desc_os, "B", "L");
$pdf->Ln(5);

$pdf->SetFont('Arial', 'B', 12);
$pdf->Cell(0, 4, "Defeito", "", 0, "L");
$pdf->Ln(4);
$pdf->SetFont('Arial', '', 11);
$pdf->MultiCell(0, 10, $def_os, "B", "L");
$pdf->Ln(5);

$pdf->SetFont('Arial', 'B', 12);
$pdf->Cell(0, 4, "Observacao", "", 0, "L");
$pdf->Ln(4);
$pdf->SetFont('Arial', '', 11);
$pdf->MultiCell(0, 10, $obs_os, "B", "L");
$pdf->Ln(7);

//Total da OS
$totalOs = 0;

//Produtos
if ($qtdProd > 0 ){
    $pdf->SetFont('Arial', 'B', 12);
    $pdf->Cell(75, 6, "Produto", "TLBR",0,"L");
    $pdf->Cell(75, 6, "Quantidade", "TBR",0,"L");
    $pdf->Cell(0, 6, "Subtotal", "TBR",0,"L");
    $pdf->Ln(6);
    $pdf->SetFont('Arial', '', 11);
    foreach ($prods_exibir AS $row){
        $pdf->Cell(75, 6, $row['prod_os'], "LBR",0,"L");
        $pdf->Cell(75, 6, $row['qtd_os'], "BR",0,"L");
        $pdf->Cell(0, 6, $row['subvalor_os'], "BR",0,"L");
        $pdf->Ln(6);
        $totalOs += $row['subvalor_os'];
    }
    $pdf->Cell(0, 6, "", "B",0,"L");
    $pdf->Ln(10);
}

//Servicos
if ($qtdServ > 0 ){
    $pdf->SetFont('Arial', 'B', 12);
    $pdf->Cell(100, 6, "Servico", "TLBR",0,"L");
    $pdf->Cell(0, 6, "Subtotal", "TBR",0,"L");
    $pdf->Ln(6);
    $pdf->SetFont('Arial', '', 11);
    foreach ($servs_exibir AS $row){
        $pdf->Cell(100, 6, $row['serv_os'], "LBR",0,"L");
        $pdf->Cell(0, 6, $row['preco_os'], "BR",0,"L");
        $pdf->Ln(6);
        $totalOs += $row['preco_os'];
    }
    $pdf->Cell(0, 4, "", "B",0,"L");
    $pdf->Ln(10);
}

$pdf->SetFont('Arial', 'B', 14);
$pdf->Cell(0, 10, "TOTAL: ...................................... R$ ".number_format($totalOs, 2, ",", "."),0,0, "R");


$pdf->Output("I");