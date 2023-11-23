<?php

namespace App\Livewire\Posts;

use Livewire\Component;
use Illuminate\Support\Str;
use Livewire\Attributes\Title;

// Attributes\Title is a Livewire attribute that allows you to set the page title from within the component.
#[Title('Posts')]
class Index extends Component
{
    public $title, $content, $postId, $slug, $status, $updatePost = false, $addPost = false;

    protected $rules = [
        'title' => 'required',
        'content' => 'required',
        'status' => 'required'
    ];

    public function resetFields()
    {
        $this->title = '';
        $this->content = '';
        $this->slug = '';
        $this->status = 1;
    }
    public function render()
    {
        $posts = \App\Models\Post::latest()->get();
        return view('livewire.posts.index', compact('posts'));
    }

    // Function to CRUD (Create, Read, Update, Delete) posts
    public function create()
    {
        $this->resetFields();
        $this->addPost = true;
        $this->updatePost = false;
    }

    public function store()
    {
        // Validate fields
        $this->validate();
        try {
            // Create post in database with the validated fields
            \App\Models\Post::create([
                'title' => $this->title,
                'content' => $this->content,
                'slug' => Str::slug($this->title),
                'status' => $this->status,
            ]);
            // Show success message and reset fields and hide the form
            session()->flash('success', 'Post created successfully');
            $this->resetFields();
            $this->addPost = false;
        }
        // Catch any error and show it in the sessioon
        // Exceptions is a PHP class that allows you to catch any error then store it in a variable $error
        catch (\Exception $error) {
            session()->flash('error', $error->getMessage());
        }
    }

    public function edit($id)
    {
        try {
            $post = \App\Models\Post::findOrFail($id);
            if (!$post) {
                session()->flash('error','Post not found');
            } else {
                $this->postId = $post->id;
                $this->title = $post->title;
                $this->content = $post->content;
                $this->status = $post->status;
                $this->updatePost = true;
                $this->addPost = false;
            }
            
        } catch (\Exception $error) {
            session()->flash('error', $error->getMessage());
        }
    }

    public function update()
    {
        $this->validate();
        try {
            \App\Models\Post::find($this->postId)->update([
                'title' => $this->title,
                'content' => $this->content,
                'status' => $this->status,
                'slug' => Str::slug($this->title)
            ]);
            session()->flash('success','Post Updated Successfully');
            $this->resetFields();
            $this->updatePost = false;
        } catch (\Exception $error) {
            session()->flash('error',$error->getMessage());
        }
    }

    public function cancel()
    {
        $this->addPost = false;
        $this->updatePost = false;
        $this->resetFields();
    }

    public function destroy($id)
    {
        try {
            \App\Models\Post::find($id)->delete();
            session()->flash('success','Post Deleted Successfully');
        } catch (\Exception $error) {
            session()->flash('error',$error->getMessage());
        }
    }

    public function changeStatus($id)
    {
        try {
            $post = \App\Models\Post::findOrFail($id);
            if ($post->status == 1) {
                $post->update([
                    'status' => 0
                ]);
            } else {
                $post->update([
                    'status' => 1
                ]);
            }
            session()->flash('success','Post Status Changed Successfully');
        } catch (\Exception $error) {
            session()->flash('error',$error->getMessage());
        }
    }
}
