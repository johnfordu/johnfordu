<?php $__env->startSection('content'); ?>
<div class="text-white">
    <h2 class="text-3xl font-bold mb-6">🎥 Add New Movie</h2>

    <form action="<?php echo e(route('movies.store')); ?>" method="POST" enctype="multipart/form-data" class="bg-gray-900 p-6 rounded-lg shadow-lg space-y-4">
        <?php echo csrf_field(); ?>

        <div>
            <label class="block font-bold mb-2">Title:</label>
            <input type="text" name="title" class="w-full p-2 rounded bg-gray-800 text-white" required>
        </div>

        <div>
            <label class="block font-bold mb-2">Rating (1-5):</label>
            <input type="number" name="rating" min="1" max="5" class="w-full p-2 rounded bg-gray-800 text-white" required>
        </div>

        <div>
            <label class="block font-bold mb-2">Review:</label>
            <textarea name="review" rows="4" class="w-full p-2 rounded bg-gray-800 text-white" required></textarea>
        </div>

        <div>
            <label class="block font-bold mb-2">Movie Poster (optional):</label>
            <input type="file" name="image" accept="image/*" class="w-full p-2 bg-gray-800 text-white rounded">
        </div>

        <button type="submit" class="w-full bg-red-600 hover:bg-red-700 text-white font-bold py-2 rounded">
            Add Movie
        </button>
    </form>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\Users\user\Ubina_Quiz\resources\views/movies/create.blade.php ENDPATH**/ ?>