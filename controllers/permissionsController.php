<?php
class PermissionsController extends Controller
{
	private $user;

    public function __construct()
    {
        $this->user = new Users();

        if (!$this->user->verifyLogin()) {
            header("Location: ".BASE_URL."login");
            exit;
		}

        if (!$this->user->hasPermission('ver_permissoes')) {
            $this->loadView('404/500');
            exit;
        } 
    }
	
	public function index()
	{   
        $data = array(
            'menuActive' => 'permissions',
            'user' => $this->user,
        );
        $data['name'] = $this->user->getUserName();
        $data['titulo'] = 'Permissões';
        $data['menu'] = 'permissao';
        $p = new Permissions();
        $data['list'] = $p->getAllGroups();
      

        $this->loadTemplate('permissoes/permissoes', $data);
	}

    public function del($id_group)
    {
        $p = new Permissions();

        $p->deleteGroup($id_group);

        header("Location: ".BASE_URL."Permissions");
        exit;
    }

    public function add()
    {
        $data = array(
            'menuActive' => 'permissions',
            'user' => $this->user,
        );
        
        $p = new Permissions();
        $data['permission_itens'] = $p->getAllItems();
        $data['name'] = $this->user->getUserName();
        $data['titulo'] = 'Nova Permissão';
        $data['menu'] = 'permissao';
       
        $this->loadTemplate('Permissoes/grupo_add', $data);
    }

    public function add_action()
    {
        $p = new Permissions();

        if (!empty($_POST['nome_group']) && !empty($_POST['nome_group'])) {

            $nome_group = addslashes(trim($_POST['nome_group']));

            $id = $p->addGroup($nome_group);

            if (isset($_POST['items']) && count($_POST['items']) > 0) {
                $items = $_POST['items'];
                foreach ($items as $item) {
                    $p->linkItemToGroup($item, $id);
                }
            }
            
            header("Location: ".BASE_URL."Permissions");
            exit;

        } else {
            $_SESSION['formError'] = array('nome_group');
            header("Location: ".BASE_URL."Permissions/add");
            exit;
        }
    }

    public function edit($id_group)
    {
        // echo "<pre>";
        // print_r($id_group);
        // exit;
        if (!empty($id_group)) {
            
            $data = array(
                'menuActive' => 'permissions',
                'user' => $this->user,
            );
            
            $p = new Permissions();
            $data['permission_itens'] = $p->getAllItems();
            $data['permission_group_name'] = $p->getPermissionGroupName($id_group);
            $data['permission_group_slugs'] = $p->getPermissoes($id_group);
            $data['permission_id'] = $id_group;
            $data['name'] = $this->user->getUserName();
            $data['titulo'] = 'Edição de permissão';
            $data['menu'] = 'permissao';

        //     echo "<pre>";
        // print_r($data['permission_group_slugs']);
        // exit;
         
            $this->loadTemplate('Permissoes/group_edit', $data);

        } else {
            header("Location: ".BASE_URL."Permissions");
            exit;
        }
    }

    public function edit_action($id_group)
    {
        $p = new Permissions();
        if (!empty($id_group)) {

            if (!empty($_POST['nome_group']) && !empty($_POST['nome_group'])) {

                $nome_group = addslashes(trim($_POST['nome_group']));

                $p->editName($nome_group, $id_group);

                $p->clearLinks($id_group);

                if (isset($_POST['items']) && count($_POST['items']) > 0) {
                    $items = $_POST['items'];
                    foreach ($items as $item) {
                        $p->linkItemToGroup($item, $id_group);
                    }
                }

                header("Location: ".BASE_URL."Permissions");
                exit;

            } else {
                header("Location: ".BASE_URL."Permissions/edit/".$id_group);
                exit;
               } 
            } else {
                header("Location: ".BASE_URL."Permissions");
                exit;
            }
        }

        public function items()
        {
            $data = array(
                'menuActive' => 'permissions',
                'user' => $this->user,
            );

            $p = new Permissions();
            $data['list'] = $p->getAllItems();
            $data['name'] = $this->user->getUserName();
            $data['titulo'] = 'Item de permissões';
            $data['menu'] = 'permissao';
            
            $this->loadTemplate('Permissoes/permissoes_items', $data);
        }

        public function items_add()
        {
            $p = new Permissions();
            if (!empty($_POST['nome']) && !empty($_POST['nome'])) {
                
                $nome = addslashes(trim($_POST['nome']));
                $slug = addslashes(trim($_POST['slug']));

                $p->addPermissao($nome, $slug);
                header("Location: ".BASE_URL."Permissions/items");
                exit;
            }
        }

        public function items_edit($id_p_item)
        {
            $p = new Permissions();
            if (!empty($_POST['nome']) && !empty($_POST['nome'])) {
                
                $nome = addslashes(trim($_POST['nome']));

                $p->editPermissao($id_p_item, $nome);
                header("Location: ".BASE_URL."Permissions/items");
                exit;
            }
        }
}