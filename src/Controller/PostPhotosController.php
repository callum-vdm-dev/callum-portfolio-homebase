<?php
declare(strict_types=1);

namespace App\Controller;

use App\Model\Table\PostPhotosTable;
use Cake\Datasource\FactoryLocator;

/**
 * PostPhotos Controller
 *
 * @property \App\Model\Table\PostPhotosTable $PostPhotos
 */
class PostPhotosController extends AppController
{
    private PostPhotosTable $PostPhotos;

    public function __construct(...$args)
    {
        parent::__construct(...$args);
        $this->PostPhotos = $this->fetchTable('PostPhotos');
    }
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {

        $query = $this->PostPhotos->find()
            ->contain(['Posts']);
        $postPhotos = $this->paginate($query);

        $this->set(compact('postPhotos'));
    }

    /**
     * View method
     *
     * @param string|null $id Post Photo id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $postPhoto = $this->PostPhotos->get($id, contain: ['Posts']);
        $this->set(compact('postPhoto'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $postPhoto = $this->PostPhotos->newEmptyEntity();
        if ($this->request->is('post')) {
            $postPhoto = $this->PostPhotos->patchEntity($postPhoto, $this->request->getData());
            if ($this->PostPhotos->save($postPhoto)) {
                $this->Flash->success(__('The post photo has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The post photo could not be saved. Please, try again.'));
        }
        $posts = $this->PostPhotos->Posts->find('list', limit: 200)->all();
        $this->set(compact('postPhoto', 'posts'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Post Photo id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $postPhoto = $this->PostPhotos->get($id, contain: []);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $postPhoto = $this->PostPhotos->patchEntity($postPhoto, $this->request->getData());
            if ($this->PostPhotos->save($postPhoto)) {
                $this->Flash->success(__('The post photo has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The post photo could not be saved. Please, try again.'));
        }
        $posts = $this->PostPhotos->Posts->find('list', limit: 200)->all();
        $this->set(compact('postPhoto', 'posts'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Post Photo id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $postPhoto = $this->PostPhotos->get($id);
        if ($this->PostPhotos->delete($postPhoto)) {
            $this->Flash->success(__('The post photo has been deleted.'));
        } else {
            $this->Flash->error(__('The post photo could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
