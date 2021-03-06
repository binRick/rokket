<?php

class ssh {
	
	protected $host;
	protected $user;
	protected $pass;
	
	protected $ssh;
	
	public function __construct($host, $user, $pass) {
	
		$this->host = $host;
		$this->user = $user;
		$this->password = $pass;
		
		$this->ssh = new Net_SSH2($host);
		
		if (!$this->ssh->login($user, $pass)) {
		    echo message::danger(lang::get('ssh_login_failed'), false);
			return false;
		}
		
		return $this->ssh;
	
	}
	
	public function exec($cmd) {
		
		return $this->ssh->exec($cmd);
		
	}
	
	public function write($cmd) {
		
		return $this->ssh->write($cmd);
	
	}
	
	public function read() {
		
		return nl2br($this->ssh->read());
			
	}
	
	public function getScreen() {
		
		return $this->ssh->getScreen();
			
	}
	
	public function isTimeout() {
		
		return $this->ssh->isTimeout();
			
	}
	
	public function setTimeout($time) {
		
		return $this->ssh->setTimeout($time);
			
	}
	
	public function reset() {
		
		return $this->ssh->reset();
			
	}
	
}

?>