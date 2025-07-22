<?php
declare(strict_types=1);

namespace App\Controller;

use Cake\Database\Expression\QueryExpression;
use Cake\ORM\TableRegistry;

/**
 * Projects Controller
 *
 * @property \App\Model\Table\ProjectsTable $Projects
 */
class ProjectsController extends AppController
{

    public function initialize(): void {
        parent::initialize();
        $this->viewBuilder()->setHelpers(['Project']);
    }

    public function beforeFilter(\Cake\Event\EventInterface $event)
    {
        parent::beforeFilter($event);

        // Allow unauthenticated access to the public pages
        $this->Authentication
            ->addUnauthenticatedActions(['publicList', 'publicView']);
    }

    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $query = $this->Projects->find()
            ->contain(['Users']);
        $projects = $this->paginate($query);

        $this->viewBuilder()->setLayout('admin');
        $this->set(compact('projects'));
    }

    /**
     * View method
     *
     * @param string|null $id Project id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $project = $this->Projects->get($id, contain: ['Users', 'Posts']);
        $this->viewBuilder()->setLayout('admin');
        $this->set(compact('project'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $project = $this->Projects->newEmptyEntity();
        if ($this->request->is('post')) {
            $project = $this->Projects->patchEntity($project, $this->request->getData());
            if ($this->Projects->save($project)) {
                $this->Flash->success(__('The project has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The project could not be saved. Please, try again.'));
        }
        $users = $this->Projects->Users->find('list', limit: 200)->all();
        $this->viewBuilder()->setLayout('admin');
        $this->set(compact('project', 'users'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Project id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $project = $this->Projects->get($id, contain: []);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $project = $this->Projects->patchEntity($project, $this->request->getData());
            if ($this->Projects->save($project)) {
                $this->Flash->success(__('The project has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The project could not be saved. Please, try again.'));
        }
        $users = $this->Projects->Users->find('list', limit: 200)->all();
        $this->viewBuilder()->setLayout('admin');
        $this->set(compact('project', 'users'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Project id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $project = $this->Projects->get($id);
        if ($this->Projects->delete($project)) {
            $this->Flash->success(__('The project has been deleted.'));
        } else {
            $this->Flash->error(__('The project could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }

    /**
     * publicList method
     *
     * Shows a grid of all published projects on the public site.
     */
    public function publicList(): void
    {
        $this->loadComponent('Content');

        $contents = TableRegistry::getTableLocator()->get('Contents');
        $contentRaw = $contents->find()
            ->where(['slug' => 'projects'])->all();
        $projectsContent = $this->Content->prepareContents($contentRaw);
        $this->set(compact('projectsContent'));

        $query = $this->Projects->find()
            ->contain(['Users'])
            ->where(['Projects.status !=' => 'archived'])
            ->order([
                new QueryExpression('ISNULL(Projects.start_date) ASC'), // put entries with real start_date first
                new QueryExpression('COALESCE(Projects.start_date, Projects.created) DESC')
            ]);
        $projects = $this->paginate($query, [
            'limit'    => 12,
            'maxLimit' => 24,
        ]);

        $this->viewBuilder()->setLayout('public');
        $this->set(compact('projects'));
    }

    /**
     * publicView method
     *
     * Shows one project’s detail page on the public site.
     *
     * @param string|null $id Project id.
     * @throws \Cake\Http\Exception\NotFoundException When record not found or not published.
     */
    public function publicView(?string $slug = null): void
    {
        $this->viewBuilder()->setLayout('public');

        $project = $this->Projects->find()
            ->contain(['Users', 'Posts']) // Add associations as needed
            ->where(['Projects.slug' => $slug, 'Projects.status !=' => 'archived'])
            ->first();

        if (!$project) {
            throw new NotFoundException(__('Project not found or unavailable.'));
        }

        $this->set(compact('project'));
    }
}
