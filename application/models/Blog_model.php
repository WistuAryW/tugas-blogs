<?php 
class Blog_model extends  CI_Model
{

    public function getBlogs($limit,$offset)
    {
        $filter = $this->input->get('find');
        $this->db->like('title',$filter);
        $this->db->limit($limit,$offset);
        $this->db->order_by('date','desc');

        return $this->db->get("blog");
    }

    public function otherPost($id,$limit,$offset)
    {
        $filter = $this->input->get('find');
        $this->db->where('id !=' ,  $id);
        $this->db->like('title',$filter);
        $this->db->limit($limit,$offset);
        $this->db->order_by('date','desc');

        return $this->db->get("blog");
    }

    public function getTotalBlog()
    {
        $filter = $this->input->get('find');
        $this->db->like('title',$filter);
        return $this->db->count_all_results("blog");
    }

    public function getSingleBlog($field,$value)
    {   
        $this->db->where($field,$value);
        $query = $this->db->get('blog');
        return  $query->row_array();
    }

    public function insertBlog($data)
    {
        $this->db->insert('blog',$data);
        return $this->db->insert_id();
    }

    public function updatetBlog($id,$post)
    {
        $this->db->where('id',$id);
        $this->db->update('blog',$post);
        return $this->db->affected_rows();
    }

    public function deleteBlog($id)
    {
        $this->db->where('id',$id);
        $this->db->delete('blog');
        return $this->db->affected_rows();
    }
}
?>