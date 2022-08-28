<?php
class Pedido { 
	private $codigoPedido; 	private $data;  private $taxaImposto;  private $valorFrete;  private $totalPedido = 0; 
    private $totalImposto = 0; private $totalItens = 0; private $totalItensVendidos = 0;

    public function iniciaPedido($codigoPedido, $data, $taxaImposto, $valorFrete){
        $this->setCodigoPedido($codigoPedido);
        $this->setData($data);
        $this->setTaxaImposto($taxaImposto);
        $this->setValorFrete($valorFrete);
    }

    public function mostrarDados($clientes){
       echo "Código Pedido: ".$this->getCodigoPedido().PHP_EOL;  
       echo "Data: ".$this->getData().PHP_EOL; 
       echo "Taxa Imposto: ".$this->getTaxaImposto().PHP_EOL; 
       echo "Valor Frete: ".$this->getValorFrete().PHP_EOL.PHP_EOL; 
       echo "Total de Imposto: ".$this->getTotalImposto().PHP_EOL; 
       echo "Total de Itens: ".$this->getTotalItens().PHP_EOL.PHP_EOL; 

       echo "Valor Total: ".$this->getTotalPedido().PHP_EOL; 
       echo "Total itens Vendidos: ".$this->getTotalItensVendidos().PHP_EOL; 


    }

    public function incluirItemPedido($itens, $valor = 0){
        if($itens != null) $this->totalItens = $this->getTotalItens() + $itens;
        if($valor != null){
             $this->totalPedido = $this->getTotalPedido() + $valor;       
             $this->totalizarItens($itens);
        } 

        
    }

    public function totalizarItens($itens){
        $this->totalItensVendidos = $this->getTotalItensVendidos() + $itens;
    }

    public function calcularImposto(){
        $this->totalImposto = ($this->getTotalPedido())*($this->getTaxaImposto()/100);
    }

    public function calcularTotalPedido(){
        $this->totalPedido = $this->getTotalPedido() + $this->getTotalImposto() + $this->getValorFrete();
    }
   
    //Getters and Setters
        public function setCodigoPedido($codigoPedido) { 
            if ($codigoPedido != NULL) $this->codigoPedido = $codigoPedido; 
        } 

        public function getCodigoPedido() { 
            return $this->codigoPedido; 
        } 


        public function setData($data) { 
            if (is_string($data)) $this->data = $data; 
        } 

        public function getData() { 
            return $this->data; 
        } 


        public function setTaxaImposto($taxaImposto) { 
            if ($taxaImposto != NULL) $this->taxaImposto = $taxaImposto; 
        } 

        public function getTaxaImposto() { 
            return $this->taxaImposto; 
        } 


        public function setValorFrete($valorFrete) { 
            if ($valorFrete != NULL) $this->valorFrete = $valorFrete; 
        } 

        public function getValorFrete() { 
            return $this->valorFrete; 
        } 

        public function getTotalPedido() { 
            return $this->totalPedido; 
        } 

        public function getTotalImposto() { 
            return $this->totalImposto; 
        }

        public function getTotalItens() { 
            return $this->totalItens; 
        } 

        public function getTotalItensVendidos() { 
            return $this->totalItensVendidos; 
        } 

} 

$pedido = new Pedido; 
$pedido->iniciaPedido(1, '28/08/2022', 10, 50); 

$pedido->incluirItemPedido(1, 400);
$pedido->incluirItemPedido(2, 100);
$pedido->incluirItemPedido(4);
$pedido->incluirItemPedido(1, 500);

$pedido->calcularImposto();
$pedido->calcularTotalPedido();

$pedido->mostrarDados($pedido);


