<?php

class Post_model extends CI_Model{
    public function insert($file){
         $this->db->insert('posts', $file);
    }
    public function get_all(){
        $this->db->select('posts.*, users.fullname AS author_name');
        $this->db->join('users', 'posts.author_id = users.id');
        $this->db->where('posts.status','C');
        $this->db->order_by('posts.id','desc');
        $result = $this->db->get('posts');
        return $result->result();
    }

    public function get_all_by_author_id($author_id){
        $this->db->select('posts.*, users.fullname AS author_name');
        $this->db->join('users', 'posts.author_id = users.id');
        $this->db->where('author_id', $author_id);
        $this->db->order_by('posts.id','desc');
        $result = $this->db->get('posts', 5 , 0);
        return $result->result();
    }

    public function get_one($post_id){
        $this->db->select('posts.*, users.fullname AS author_name');
        $this->db->where('posts.id', $post_id);
        $this->db->join('users', 'posts.author_id = users.id');
        $res = $this->db->get('posts');
        return $res;
    }
    public function get_post_by_page($cat, $subCat, $page){
        if($cat !== 0){
            $this->db->where('cat_id', $cat);
            if($subCat !== 0){
                $this->db->where('sub_cat_id', $subCat);
            }
        }
        $this->db->where('posts.status','C');
        $results = $this->db->get('posts', 8, (int)$page * 8);
        return $results->result();
    }

    public function insert_comment($post_id){
        $data = array(
            'author_id' => $this->session->userdata('userid'),
            'author_name' => $this->session->userdata('fullname'),
            'post_id' => $post_id,
            'comment' => $this->input->post('comment')
        );
        $this->db->insert('comments', $data);
    }

    public function get_all_comment($post_id){
        $this->db->where('post_id', $post_id);
        $results = $this->db->get('comments');
        return $results->result();
    }

    public function get_post_info_by_id($id ){
        return $this->db->select('*')
            ->from('posts')           
            ->where('id',$id)
            ->get()
            ->result(); 
    }

    public function update($data){
        
        $this->db->where('id',$data['id']);
        $this->db->update('posts',$data);     
        
    } 

    public function pending_info(){
        
     
           return $this->db->select('*')
            ->from('posts')
            ->where('status','P')          
            ->order_by('id','desc')
            ->get()
            ->result(); 

           
    }

    function get_user_name($id){
        $this->db->select('posts.*, users.*');
        $this->db->join('users', 'posts.author_id = users.id');
        $this->db->where('posts.author_id', $id);
        
        $query = $this->db->get('posts');
        return $query->row_array();
    }

    function confirm($data ){
    

        return  $this->db->where('id',$data['id'])
                    ->update('posts',$data);
    }

    function delete($id ){
    

         return  $this->db->where('id',$data['id'])
                    ->update('posts',$data);
    }

    function post_delete($id) {
        return $this->db->where('id',$id)
            ->delete('posts');
    }
}