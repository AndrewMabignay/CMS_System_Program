<x-layout>
    <section class="post-section" x-data="{ showPostAdd: false, showPostEdit: false }" x-ref="postSection">
		

        <!-- ADD POST FORMS -->
		 <template x-if="showPostAdd || showPostEdit">
			<div class="overlay" @click="showPostAdd = false; showPostEdit = false"></div>
		</template>

        <template x-if="showPostAdd">
			<div class="add-post-container">
				<h3>Create New Post</h3>

				<div class="input-container">
					<label for="">Title</label>
					<input type="text" id="title">
				</div>

				<div class="input-container">
					<label for="">Category</label>
					<input type="text" id="title">
				</div>

				<div class="input-container">
					<label for="status">Status</label>
					
                    <div class="radio-draft-container">
                        <input type="radio" name="status" id="status" value="draft"> Draft
                    </div>

                    <div class="radio-published-container">
                        <input type="radio" name="status" id="status" value="published"> Published
                    </div>
				</div>
			</div>
		</template>

		<template x-if="showEdit">
			<div class="add-category-container">
				<h3>Edit Category</h3>
				<button @click="showEdit = false">Close</button>
			</div>
		</template>
	</section>
</x-layout>