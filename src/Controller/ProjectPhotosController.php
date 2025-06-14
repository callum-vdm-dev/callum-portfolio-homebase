<?php
declare(strict_types=1);

namespace App\Controller;

/**
 * ProjectPhotos Controller
 *
 * @property \App\Model\Table\ProjectPhotosTable $ProjectPhotos
 */
class ProjectPhotosController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $query = $this->ProjectPhotos->find()
            ->contain(['Projects']);
        $projectPhotos = $this->paginate($query);

        $this->set(compact('projectPhotos'));
    }

    /**
     * View method
     *
     * @param string|null $id Project Photo id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $projectPhoto = $this->ProjectPhotos->get($id, contain: ['Projects']);
        $this->set(compact('projectPhoto'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $projectPhoto = $this->ProjectPhotos->newEmptyEntity();
        if ($this->request->is('post')) {
            $projectPhoto = $this->ProjectPhotos->patchEntity($projectPhoto, $this->request->getData());
            if ($this->ProjectPhotos->save($projectPhoto)) {
                $this->Flash->success(__('The project photo has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The project photo could not be saved. Please, try again.'));
        }
        $projects = $this->ProjectPhotos->Projects->find('list', limit: 200)->all();
        $this->set(compact('projectPhoto', 'projects'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Project Photo id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $projectPhoto = $this->ProjectPhotos->get($id, contain: []);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $projectPhoto = $this->ProjectPhotos->patchEntity($projectPhoto, $this->request->getData());
            if ($this->ProjectPhotos->save($projectPhoto)) {
                $this->Flash->success(__('The project photo has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The project photo could not be saved. Please, try again.'));
        }
        $projects = $this->ProjectPhotos->Projects->find('list', limit: 200)->all();
        $this->set(compact('projectPhoto', 'projects'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Project Photo id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $projectPhoto = $this->ProjectPhotos->get($id);
        if ($this->ProjectPhotos->delete($projectPhoto)) {
            $this->Flash->success(__('The project photo has been deleted.'));
        } else {
            $this->Flash->error(__('The project photo could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
