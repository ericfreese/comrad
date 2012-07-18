<?php
class HostsController extends AppController {
	var $name = 'Hosts';
	var $uses = array('Host');
	
	function index() {
		$this->set('hosts', $this->Host->find('all'));
	}
	
	function view($id) {
		$host = $this->Host->find('first', array('conditions' => array('UID' => $id)));
		if (!$host) throw new NotFoundException('Host does not exist');
		$this->set('host', $host);
	}
	
	function add() {
		if ($this->request->is('post')) {
			if ($this->Host->save($this->request->data)) {
				$this->Session->setFlash(
					'The host was saved.',
					'flash_success',
					array(
						'link_text' => 'View now',
						'link_url' => array('controller' => 'hosts', 'action' => 'view', $this->Host->id)
					), 'success'
				);
			}
		}
		$this->set('hosts', $this->Host->find('list'));
	}
	
	function edit($id) {
		if ($this->request->is('put')) {
			if ($this->Host->save($this->request->data)) {
				$this->Session->setFlash(
					'The host was saved.',
					'flash_success',
					array(
						'link_text' => 'View now',
						'link_url' => array('controller' => 'hosts', 'action' => 'view', $this->Host->id)
					), 'success'
				);
			}
		} else {
			$this->Host->id = $id;
			$this->data = $this->Host->read();
		}
	}
}
?>