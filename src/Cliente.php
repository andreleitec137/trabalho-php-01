<?php
class Cliente { 
	private $nome; 	private $endereco;  private $sexo;  private $idade;  private $limiteCredito; 
    private $limiteOperacao = 5000; private $totalVendas = 0;

    public function iniciaCliente($nome, $endereco, $sexo, $idade, $limiteCredito){
        $this->setNome($nome);
        $this->setEndereco($endereco);
        $this->setSexo($sexo);
        $this->setIdade($idade);
        $this->setLimite($limiteCredito);

    }

    public function mostrarDados($clientes){
       echo "Nome: ".$this->getEndereco().PHP_EOL;  
       echo "Endereco: ".$this->getEndereco().PHP_EOL; 
       echo "Sexo: ".$this->getSexo().PHP_EOL; 
       echo "Idade: ".$this->getIdade().PHP_EOL; 
       echo "Limite: ".$this->getLimiteCredito().PHP_EOL; 

    }

    public function vendaOK($valor){
        if ($valor > $this->limiteOperacao) return false;
    
        return true;
    }
	

    //Getters and Setters
        public function setNome($nome) { 
            if (is_string($nome)) $this->nome = $nome; 
        } 

        public function getNome() { 
            return $this->nome; 
        } 


        public function setEndereco($endereco) { 
            if (is_string($endereco)) $this->endereco = $endereco; 
        } 

        public function getEndereco() { 
            return $this->endereco; 
        } 


        public function setSexo($sexo) { 
            if (is_string($sexo)) $this->sexo = $sexo; 
        } 

        public function getSexo() { 
            return $this->nome; 
        } 


        public function setIdade($idade) { 
            if ($idade > -1) $this->idade = $idade; 
        } 

        public function getIdade() { 
            return $this->idade; 
        } 


        public function setLimite($limite) { 
            if ($limite > 0) $this->limiteCredito = $limite; 
        } 

        public function getLimiteCredito() { 
            return $this->limiteCredito; 
        } 

} 

$cliente = new Cliente; 
$cliente->iniciaCliente('André', 'Rua santa maria', 'M', 22, '20000'); 
$cliente->mostrarDados($cliente);
$cliente->vendaOK(6000);
$cliente->vendaOK(4000);