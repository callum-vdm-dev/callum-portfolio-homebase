<?php
declare(strict_types=1);

namespace App\Controller;

/**
 * Posts Controller
 *
 * @property \App\Model\Table\PostsTable $Posts
 */
class PostsController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $query = $this->Posts->find()
            ->contain(['Projects', 'Users']);
        $posts = $this->paginate($query);

        $this->viewBuilder()->setLayout('admin');
        $this->set(compact('posts'));
    }

    /**
     * View method
     *
     * @param string|null $id Post id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $post = $this->Posts->get($id, contain: ['Projects', 'Users', 'PostPhotos']);
        $this->viewBuilder()->setLayout('admin');
        $this->set(compact('post'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $post = $this->Posts->newEmptyEntity();
        if ($this->request->is('post')) {
            $post = $this->Posts->patchEntity($post, $this->request->getData());
            if ($this->Posts->save($post)) {
                $this->Flash->success(__('The post has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The post could not be saved. Please, try again.'));
        }
        $projects = $this->Posts->Projects->find('list', limit: 200)->all();
        $users = $this->Posts->Users->find('list', limit: 200)->all();
        $this->viewBuilder()->setLayout('admin');
        $this->set(compact('post', 'projects', 'users'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Post id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $post = $this->Posts->get($id, contain: []);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $post = $this->Posts->patchEntity($post, $this->request->getData());
            if ($this->Posts->save($post)) {
                $this->Flash->success(__('The post has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The post could not be saved. Please, try again.'));
        }
        $projects = $this->Posts->Projects->find('list', limit: 200)->all();
        $users = $this->Posts->Users->find('list', limit: 200)->all();
        $this->viewBuilder()->setLayout('admin');
        $this->set(compact('post', 'projects', 'users'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Post id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $post = $this->Posts->get($id);
        if ($this->Posts->delete($post)) {
            $this->Flash->success(__('The post has been deleted.'));
        } else {
            $this->Flash->error(__('The post could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }

    public function uploadImage()
    {
        $this->request->allowMethod(['post']);
        $image = $this->request->getData('image');

        if (!$image || $image->getError() !== UPLOAD_ERR_OK) {
            throw new \Cake\Http\Exception\BadRequestException('Invalid image upload.');
        }

        $uploadPath = WWW_ROOT . 'uploads' . DS;
        if (!file_exists($uploadPath)) {
            mkdir($uploadPath, 0755, true);
        }

        $filename = uniqid() . '-' . preg_replace('/[^a-z0-9\.\-_]/i', '', $image->getClientFilename());
        $fullPath = $uploadPath . $filename;

        $image->moveTo($fullPath);

        $imageUrl = $this->request->getAttribute('webroot') . 'uploads/' . $filename;

        $this->set([
            'url' => $imageUrl,
            '_serialize' => ['url']
        ]);
    }


}
