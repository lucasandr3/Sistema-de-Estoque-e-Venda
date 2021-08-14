<?php
class relatoriosController extends Controller
{
	public function __construct()
    {
        $this->user = new Users();

        if (!$this->user->verifyLogin()) {
            header("Location: ".BASE_URL."login");
            exit;
		}

        if (!$this->user->hasPermission('ver_relatorios')) {
            $this->loadView('404/500');
            exit;
        }
    }

    public function index()
    {
    	$data = array(
            'menuActive' => 'relatorios',
            'user' => $this->user,
        );

        $data['titulo'] = 'Relatórios';

    	$u = new Users();
        $data['info'] = $u->getUserName($_SESSION['idus']);

    	$this->loadTemplate('relatorios/diario', $data);
    }

    public function mensal()
    {
    	$data = array(
            'menuActive' => 'relatorios',
            'user' => $this->user,
        );

        $data['titulo'] = 'Relatórios';

    	$u = new Users();
        $data['info'] = $u->getUserName($_SESSION['idus']);

    	$this->loadTemplate('relatorios/mensal', $data);
    }

    public function caixa_dia()
    {
    	$data = array(
            'menuActive' => 'fechamento',
            'user' => $this->user,
        );

        $data['titulo'] = 'Relatórios';

        $v = new Vendas();
        if(isset($_GET['filter_date']) && !empty($_GET['filter_date'])) {
            $data_filter = $_GET['filter_date'];
            $data['dtfc'] = $data_filter;
            $data['totais'] = $v->getTotaisVendaDia($data_filter);
            $data['totais_paids'] = $v->getTotaisVendaDiaPaids($data_filter);
            $data['caixa'] = $v->getOpenCaixa($data_filter);
            $data['despesas'] = $v->getDespesasDia($data_filter);
            $data['despesas_total'] = $v->getDespesasDiaTotal($data_filter);
            // dde($data['despesas_total']);
            //credito
            $data['cmaster'] = $v->getCartaoMaster($data_filter);
            $data['cmaster2'] = $v->getCartaoMaster2($data_filter);
            $data['cvisa'] = $v->getCartaoVisa($data_filter);
            $data['cvisa2'] = $v->getCartaoVisa2($data_filter);
            $data['chiper'] = $v->getCartaoHipercard($data_filter);
            $data['chiper2'] = $v->getCartaoHipercard2($data_filter);
            $data['celo'] = $v->getCartaoElo($data_filter);
            $data['celo2'] = $v->getCartaoElo2($data_filter);
            $data['ccabal'] = $v->getCartaoCabal($data_filter);
            $data['ccabal2'] = $v->getCartaoCabal2($data_filter);
            $data['camex'] = $v->getCartaoAmex($data_filter);
            $data['camex2'] = $v->getCartaoAmex2($data_filter);
            // debito
            $data['cdmaster'] = $v->getCartaoMasterD($data_filter);
            $data['cdmaster2'] = $v->getCartaoMasterD2($data_filter);
            $data['cdvisa'] = $v->getCartaoVisaD($data_filter);
            $data['cdvisa2'] = $v->getCartaoVisaD2($data_filter);
            $data['cdhiper'] = $v->getCartaoHipercardD($data_filter);
            $data['cdhiper2'] = $v->getCartaoHipercardD2($data_filter);
            $data['cdelo'] = $v->getCartaoEloD($data_filter);
            $data['cdelo2'] = $v->getCartaoEloD2($data_filter);
            $data['cdcabal'] = $v->getCartaoCabalD($data_filter);
            $data['cdcabal2'] = $v->getCartaoCabalD2($data_filter);
            $data['cdamex'] = $v->getCartaoAmexD($data_filter);
            $data['cdamex2'] = $v->getCartaoAmexD2($data_filter);
            // custo 
            $data['custo_venda'] = $v->getTotalCusto($data_filter);
        } else {
            $data['dtfc'] = '';
            $data['totais'] = $v->getTotaisVendaDia();
            $data['totais_paids'] = $v->getTotaisVendaDiaPaids();
            $data['caixa'] = $v->getOpenCaixa();
            $data['despesas'] = $v->getDespesasDia();
            $data['despesas_total'] = $v->getDespesasDiaTotal();
            //credito
            $data['cmaster'] = $v->getCartaoMaster();
            $data['cmaster2'] = $v->getCartaoMaster2();
            $data['cvisa'] = $v->getCartaoVisa();
            $data['cvisa2'] = $v->getCartaoVisa2();
            $data['chiper'] = $v->getCartaoHipercard();
            $data['chiper2'] = $v->getCartaoHipercard2();
            $data['celo'] = $v->getCartaoElo();
            $data['celo2'] = $v->getCartaoElo2();
            $data['ccabal'] = $v->getCartaoCabal();
            $data['ccabal2'] = $v->getCartaoCabal2();
            $data['camex'] = $v->getCartaoAmex();
            $data['camex2'] = $v->getCartaoAmex2();
            // debito
            $data['cdmaster'] = $v->getCartaoMasterD();
            $data['cdmaster2'] = $v->getCartaoMasterD2();
            $data['cdvisa'] = $v->getCartaoVisaD();
            $data['cdvisa2'] = $v->getCartaoVisaD2();
            $data['cdhiper'] = $v->getCartaoHipercardD();
            $data['cdhiper2'] = $v->getCartaoHipercardD2();
            $data['cdelo'] = $v->getCartaoEloD();
            $data['cdelo2'] = $v->getCartaoEloD2();
            $data['cdcabal'] = $v->getCartaoCabalD();
            $data['cdcabal2'] = $v->getCartaoCabalD2();
            $data['cdamex'] = $v->getCartaoAmexD();
            $data['cdamex2'] = $v->getCartaoAmexD2();
            // custo 
            $data['custo_venda'] = $v->getTotalCusto();
        }
        $data['brands'] = $v->getBrandsCard();
        //dde($data['custo_venda']);
    	$u = new Users();
        $data['info'] = $u->getUserName($_SESSION['idus']);

    	$this->loadTemplate('caixa/diario', $data);
    }

    public function imprimir_reduzido($data_vendas)
    {
    	$data = array(
            'menuActive' => 'fechamento',
            'user' => $this->user,
        );

        $data['titulo'] = 'Relatórios';

        $v = new Vendas();

        $data['totais'] = $v->getTotaisVendaDia($data_vendas);
        $data['totais_paids'] = $v->getTotaisVendaDiaPaids($data_vendas);
        $data['caixa'] = $v->getOpenCaixa($data_vendas);
        $data['vendas_rel'] = $v->getVendas($data_vendas);
        $data['despesa'] = $v->getDespesasDia($data_vendas);
        $data['brands'] = $v->getBrandsCard();
        //credito
        $data['cmaster'] = $v->getCartaoMaster($data_vendas);
        $data['cvisa'] = $v->getCartaoVisa($data_vendas);
        $data['chiper'] = $v->getCartaoHipercard($data_vendas);
        $data['celo'] = $v->getCartaoElo($data_vendas);
        $data['ccabal'] = $v->getCartaoCabal($data_vendas);
        $data['camex'] = $v->getCartaoAmex($data_vendas);
        // debito
        $data['cdmaster'] = $v->getCartaoMasterD($data_vendas);
        $data['cdvisa'] = $v->getCartaoVisaD($data_vendas);
        $data['cdhiper'] = $v->getCartaoHipercardD($data_vendas);
        $data['cdelo'] = $v->getCartaoEloD($data_vendas);
        $data['cdcabal'] = $v->getCartaoCabalD($data_vendas);
        $data['cdamex'] = $v->getCartaoAmexD($data_vendas);
        // custo 
        $data['custo_venda'] = $v->getTotalCusto($data_vendas);

    	$u = new Users();
        $data['info'] = $u->getUserName($_SESSION['idus']);

        $data['data_venda'] = $data_vendas;
        $data['total_number_vendas'] = count($data['vendas_rel']);

        ob_start();
    	$this->loadView('caixa/imprimir_reduzido', $data);
        $html = ob_get_contents();
        ob_end_clean();

        $options = new Dompdf\Options();
        $options->set('isRemoteEnabled', TRUE);
        $dompdf = new Dompdf\Dompdf($options);
        $dompdf->loadHtml($html);
        $dompdf->setPaper('A4', 'portrait');
        $dompdf->render();
        $dompdf->stream('relatório do dia '.DataHifen($data_vendas).'.pdf', ["Attachment" => false]);
    }

    public function caixa_mes()
    {
        $data = array(
            'menuActive' => 'fechamento',
            'user' => $this->user,
        );

        $data['titulo'] = 'Relatórios';

		if(isset($_GET['date_ini']) && !empty($_GET['date_ini'])) {

            $u = new Users();
            $data['info'] = $u->getUserName($_SESSION['idus']);
			
			$data_inicial = $_GET['date_ini'];
			$data_final   = $_GET['date_end'];

            $v = new Vendas();

            $data['dt_ini'] = $data_inicial;
            $data['dt_end'] = $data_final;

            $data['totais'] = $v->getTotaisVendaMes($data_inicial, $data_final);
            $data['totais_paids'] = $v->getTotaisVendaMesPaids($data_inicial, $data_final); 
            $data['caixa'] = $v->getOpenCaixaMes($data_inicial, $data_final);
            $data['despesas'] = $v->getDespesasMes($data_inicial, $data_final);
            $data['despesas_total'] = $v->getDespesasMesTotal($data_inicial, $data_final);
            
            //credito
            $data['cmaster'] = $v->getCartaoMasterMes($data_inicial, $data_final);
            $data['cmaster2'] = $v->getCartaoMasterMes2($data_inicial, $data_final);
            $data['cvisa'] = $v->getCartaoVisaMes($data_inicial, $data_final);
            $data['cvisa2'] = $v->getCartaoVisaMes2($data_inicial, $data_final);
            $data['chiper'] = $v->getCartaoHipercardMes($data_inicial, $data_final);
            $data['chiper2'] = $v->getCartaoHipercardMes2($data_inicial, $data_final);
            $data['celo'] = $v->getCartaoEloMes($data_inicial, $data_final);
            $data['celo2'] = $v->getCartaoEloMes2($data_inicial, $data_final);
            $data['ccabal'] = $v->getCartaoCabalMes($data_inicial, $data_final);
            $data['ccabal2'] = $v->getCartaoCabalMes2($data_inicial, $data_final);
            $data['camex'] = $v->getCartaoAmexMes($data_inicial, $data_final);
            $data['camex2'] = $v->getCartaoAmexMes2($data_inicial, $data_final);
            // debito
            $data['cdmaster'] = $v->getCartaoMasterDM($data_inicial, $data_final);
            $data['cdmaster2'] = $v->getCartaoMasterDM2($data_inicial, $data_final);
            $data['cdvisa'] = $v->getCartaoVisaDM($data_inicial, $data_final);
            $data['cdvisa2'] = $v->getCartaoVisaDM2($data_inicial, $data_final);
            $data['cdhiper'] = $v->getCartaoHipercardDM($data_inicial, $data_final);
            $data['cdhiper2'] = $v->getCartaoHipercardDM2($data_inicial, $data_final);
            $data['cdelo'] = $v->getCartaoEloDM($data_inicial, $data_final);
            $data['cdelo2'] = $v->getCartaoEloDM2($data_inicial, $data_final);
            $data['cdcabal'] = $v->getCartaoCabalDM($data_inicial, $data_final);
            $data['cdcabal2'] = $v->getCartaoCabalDM2($data_inicial, $data_final);
            $data['cdamex'] = $v->getCartaoAmexDM($data_inicial, $data_final);
            $data['cdamex2'] = $v->getCartaoAmexDM2($data_inicial, $data_final);
            // custo 
            $data['custo_venda'] = $v->getTotalCustoM($data_inicial, $data_final);
   
			$this->loadTemplate('caixa/mensal', $data);
			
		} else {

            $u = new Users();
            $data['info'] = $u->getUserName($_SESSION['idus']);

			$data1 = mktime(0, 0, 0, date('m') , 1 , date('Y'));
			$data2 = mktime(23, 59, 59, date('m'), date("t"), date('Y'));

			$data_inicial = date('Y-m-d',$data1);
			$data_final   = date('Y-m-d',$data2);

            $data['dt_ini'] = $data_inicial;
            $data['dt_end'] = $data_final;

            $v = new Vendas();
            
			$data['totais'] = $v->getTotaisVendaMes($data_inicial, $data_final);
            $data['totais_paids'] = $v->getTotaisVendaMesPaids($data_inicial, $data_final);
            $data['caixa'] = $v->getOpenCaixaMes($data_inicial, $data_final);
            $data['despesas'] = $v->getDespesasMes($data_inicial, $data_final);
            $data['despesas_total'] = $v->getDespesasMesTotal($data_inicial, $data_final);
            
            //credito
            $data['cmaster'] = $v->getCartaoMasterMes($data_inicial, $data_final);
            $data['cmaster2'] = $v->getCartaoMasterMes2($data_inicial, $data_final);
            $data['cvisa'] = $v->getCartaoVisaMes($data_inicial, $data_final);
            $data['cvisa2'] = $v->getCartaoVisaMes2($data_inicial, $data_final);
            $data['chiper'] = $v->getCartaoHipercardMes($data_inicial, $data_final);
            $data['chiper2'] = $v->getCartaoHipercardMes2($data_inicial, $data_final);
            $data['celo'] = $v->getCartaoEloMes($data_inicial, $data_final);
            $data['celo2'] = $v->getCartaoEloMes2($data_inicial, $data_final);
            $data['ccabal'] = $v->getCartaoCabalMes($data_inicial, $data_final);
            $data['ccabal2'] = $v->getCartaoCabalMes2($data_inicial, $data_final);
            $data['camex'] = $v->getCartaoAmexMes($data_inicial, $data_final);
            $data['camex2'] = $v->getCartaoAmexMes2($data_inicial, $data_final);
            // debito
            $data['cdmaster'] = $v->getCartaoMasterDM($data_inicial, $data_final);
            $data['cdmaster2'] = $v->getCartaoMasterDM2($data_inicial, $data_final);
            $data['cdvisa'] = $v->getCartaoVisaDM($data_inicial, $data_final);
            $data['cdvisa2'] = $v->getCartaoVisaDM2($data_inicial, $data_final);
            $data['cdhiper'] = $v->getCartaoHipercardDM($data_inicial, $data_final);
            $data['cdhiper2'] = $v->getCartaoHipercardDM2($data_inicial, $data_final);
            $data['cdelo'] = $v->getCartaoEloDM($data_inicial, $data_final);
            $data['cdelo2'] = $v->getCartaoEloDM2($data_inicial, $data_final);
            $data['cdcabal'] = $v->getCartaoCabalDM($data_inicial, $data_final);
            $data['cdcabal2'] = $v->getCartaoCabalDM2($data_inicial, $data_final);
            $data['cdamex'] = $v->getCartaoAmexDM($data_inicial, $data_final);
            $data['cdamex2'] = $v->getCartaoAmexDM2($data_inicial, $data_final);
            // custo 
            $data['custo_venda'] = $v->getTotalCustoM($data_inicial, $data_final);
            
			$this->loadTemplate('caixa/mensal', $data);
		}
    }

    public function imprimir_mes($data_inicial, $data_final)
    {
    	$data = array(
            'menuActive' => 'fechamento',
            'user' => $this->user,
        );

        $data['titulo'] = 'Relatórios';

        $u = new Users();
        $data['info'] = $u->getUserName($_SESSION['idus']);

        $v = new Vendas();

        $data['dt_ini'] = $data_inicial;
        $data['dt_end'] = $data_final;

        $data['totais'] = $v->getTotaisVendaMes($data_inicial, $data_final);
        $data['totais_paids'] = $v->getTotaisVendaMesPaids($data_inicial, $data_final);
        $data['caixa'] = $v->getOpenCaixaMes($data_inicial, $data_final);
        $data['despesas'] = $v->getDespesasMes($data_inicial, $data_final);
        $data['despesas_total'] = $v->getDespesasMesTotal($data_inicial, $data_final);
        
        //credito
        $data['cmaster'] = $v->getCartaoMasterMes($data_inicial, $data_final);
        $data['cmaster2'] = $v->getCartaoMasterMes2($data_inicial, $data_final);
        $data['cvisa'] = $v->getCartaoVisaMes($data_inicial, $data_final);
        $data['cvisa2'] = $v->getCartaoVisaMes2($data_inicial, $data_final);
        $data['chiper'] = $v->getCartaoHipercardMes($data_inicial, $data_final);
        $data['chiper2'] = $v->getCartaoHipercardMes2($data_inicial, $data_final);
        $data['celo'] = $v->getCartaoEloMes($data_inicial, $data_final);
        $data['celo2'] = $v->getCartaoEloMes2($data_inicial, $data_final);
        $data['ccabal'] = $v->getCartaoCabalMes($data_inicial, $data_final);
        $data['ccabal2'] = $v->getCartaoCabalMes2($data_inicial, $data_final);
        $data['camex'] = $v->getCartaoAmexMes($data_inicial, $data_final);
        $data['camex2'] = $v->getCartaoAmexMes2($data_inicial, $data_final);
        // debito
        $data['cdmaster'] = $v->getCartaoMasterDM($data_inicial, $data_final);
        $data['cdmaster2'] = $v->getCartaoMasterDM2($data_inicial, $data_final);
        $data['cdvisa'] = $v->getCartaoVisaDM($data_inicial, $data_final);
        $data['cdvisa2'] = $v->getCartaoVisaDM2($data_inicial, $data_final);
        $data['cdhiper'] = $v->getCartaoHipercardDM($data_inicial, $data_final);
        $data['cdhiper2'] = $v->getCartaoHipercardDM2($data_inicial, $data_final);
        $data['cdelo'] = $v->getCartaoEloDM($data_inicial, $data_final);
        $data['cdelo2'] = $v->getCartaoEloDM2($data_inicial, $data_final);
        $data['cdcabal'] = $v->getCartaoCabalDM($data_inicial, $data_final);
        $data['cdcabal2'] = $v->getCartaoCabalDM2($data_inicial, $data_final);
        $data['cdamex'] = $v->getCartaoAmexDM($data_inicial, $data_final);
        $data['cdamex2'] = $v->getCartaoAmexDM2($data_inicial, $data_final);
        // custo 
        $data['custo_venda'] = $v->getTotalCustoM($data_inicial, $data_final);
    
        ob_start();
        $this->loadView('caixa/imprimir_mes', $data);
        $html = ob_get_contents();
        ob_end_clean();

        $options = new Dompdf\Options();
        $options->set('isRemoteEnabled', TRUE);
        $dompdf = new Dompdf\Dompdf($options);
        $dompdf->loadHtml($html);
        $dompdf->setPaper('A4', 'portrait');
        $dompdf->render();
        $dompdf->stream("relatório do mês de ".mesRel($data_inicial).".pdf", ["Attachment" => false]);
    }

    public function vendas_vendedor()
    {
        $data = array(
            'menuActive' => 'fechamento',
            'user' => $this->user,
        );

        $data['titulo'] = 'Relatórios';

        if(isset($_GET['date_ini']) && !empty($_GET['date_ini'])) {

            $u = new Users();
            $data['info'] = $u->getUserName($_SESSION['idus']);
        
			$data_inicial = $_GET['date_ini'];
			$data_final   = $_GET['date_end'];

            $v = new Vendas();

            $data['dt_ini'] = $data_inicial;
            $data['dt_end'] = $data_final;

            $data['list'] = $u->getAllVendas($data_inicial, $data_final);

            $data['totais_vendedores'] = $v->getTotalVendasVendedores($data_inicial, $data_final);
            
			$this->loadTemplate('caixa/vendedores', $data);
			
		} else {

            $u = new Users();
            $data['info'] = $u->getUserName($_SESSION['idus']);
        
			$data1 = mktime(0, 0, 0, date('m') , 1 , date('Y'));
			$data2 = mktime(23, 59, 59, date('m'), date("t"), date('Y'));

			$data_inicial = date('Y-m-d',$data1);
			$data_final   = date('Y-m-d',$data2);

            $data['dt_ini'] = $data_inicial;
            $data['dt_end'] = $data_final;

            $data['list'] = $u->getAllVendas($data_inicial, $data_final);

            $v = new Vendas();
            
			$data['totais_vendedores'] = $v->getTotalVendasVendedores($data_inicial, $data_final);
             
			$this->loadTemplate('caixa/vendedores', $data);
		}
    }
}