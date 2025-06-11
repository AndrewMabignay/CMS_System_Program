<x-layout>
	<section class="category-section" x-data="{ showCategoryAdd: false, showEdit: false }" x-ref="categorySection">
		<div class="category-container flex flex-col gap-[20px]">
			
			{{-- CATEGORY | SEARCH | ADD | REFRESH --}}
			<div class="search-add-refresh-container h-[60px] flex flex-col items-center">
				<h2 class="w-full px-[30px]">Category</h2>

				<div class="button-container bg-white w-full">
					<div class="search-container">
						<input type="text" name="" id="search-category">
						<button>
							
						</button>
					</div>

					<button @click="showCategoryAdd = true">
						<i class="fas fa-plus"></i>
					</button>

					<button>
						<i class="fas fa-sync-alt"></i>
					</button>
				</div>
			</div>

			<div class="table-wrapper">
				<table id="category-table" class="w-full px-[20px] border-seperate rounded-[8px] text-center">
					<thead>
						<tr>
							<th>Name</th>
							<th>Slug</th>
							<th>Action</th>
						</tr>
					</thead>
					<tbody>
					</tbody>
				</table>
			</div>
		</div>


        <!-- FORMS -->
		 <template x-if="showCategoryAdd || showEdit">
			<div class="overlay" @click="showCategoryAdd = false; showEdit = false"></div>
		</template>

        <template x-if="showCategoryAdd">
			<div class="add-category-container">
				<h3>Add Category</h3>

				<div class="input-container">
					<label for="">Name</label>
					<input type="text" id="name">
				</div>

				<div class="input-container">
					<label for="">Slug</label>
					<input type="text" id="slug">
				</div>

				<div class="button-container">
					<button @click="showCategoryAdd = false">Close</button>
					<button id="addCategory">Add</button>
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