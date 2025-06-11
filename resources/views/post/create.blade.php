<x-layout>
    <section class="post-add-section h-full">     
        <div class="add-post-container text-[var(--primary-color)] h-full flex flex-col">
            <h3 class="w-full bg-[var(--tertiary-color)] h-[70px] pl-[40px] text-[16px] rounded-lg shadow flex justify-start items-center">Create New Post</h3>

            <div class="add-post-container mt-[14px] bg-[var(--tertiary-color)] h-full px-[40px] py-[30px] rounded-lg">
                <div class="add-post-form bg-[var(--tertiary-color-one)] shadow grid grid-cols-2 gap-[12px]">
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
            </div>
        </div>
	</section>
</x-layout>