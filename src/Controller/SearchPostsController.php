<?php
declare(strict_types=1);

namespace App\Controller;

/**
 * SearchPosts Controller
 *
 * @property \App\Model\Table\SearchPostsTable $SearchPosts
 * @method \App\Model\Entity\SearchPost[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class SearchPostsController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Users'],
        ];
        $searchPosts = $this->paginate($this->SearchPosts);

        $this->set(compact('searchPosts'));
    }

    /**
     * View method
     *
     * @param string|null $id Search Post id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $searchPost = $this->SearchPosts->get($id, [
            'contain' => ['Users'],
        ]);

        $this->set(compact('searchPost'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $searchPost = $this->SearchPosts->newEmptyEntity();
        if ($this->request->is('post')) {
            $searchPost = $this->SearchPosts->patchEntity($searchPost, $this->request->getData());
            if ($this->SearchPosts->save($searchPost)) {
                $this->Flash->success(__('The search post has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The search post could not be saved. Please, try again.'));
        }
        $users = $this->SearchPosts->Users->find('list', ['limit' => 200]);
        $this->set(compact('searchPost', 'users'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Search Post id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $searchPost = $this->SearchPosts->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $searchPost = $this->SearchPosts->patchEntity($searchPost, $this->request->getData());
            if ($this->SearchPosts->save($searchPost)) {
                $this->Flash->success(__('The search post has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The search post could not be saved. Please, try again.'));
        }
        $users = $this->SearchPosts->Users->find('list', ['limit' => 200]);
        $this->set(compact('searchPost', 'users'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Search Post id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $searchPost = $this->SearchPosts->get($id);
        if ($this->SearchPosts->delete($searchPost)) {
            $this->Flash->success(__('The search post has been deleted.'));
        } else {
            $this->Flash->error(__('The search post could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
