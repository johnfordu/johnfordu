<?php $__env->startSection('content'); ?>
<div class="text-white">
    <h2 class="text-3xl font-bold mb-6">🎬 Edit Movie</h2>

    
    <div class="bg-gray-800 p-4 rounded-lg mb-6 shadow-md">
        <h3 class="text-xl font-semibold mb-2">Current Movie Details</h3>
        <div class="flex items-start space-x-4">
            <?php if($movie->image): ?>
                <img src="<?php echo e(asset('storage/' . $movie->image)); ?>" class="w-32 h-40 object-cover rounded-lg shadow">
            <?php else: ?>
                <div class="w-32 h-40 bg-gray-700 flex items-center justify-center rounded">
                    <span class="text-gray-400 text-sm">No Image</span>
                </div>
            <?php endif; ?>
            <div>
                <p class="text-lg font-bold text-pink-400"><?php echo e($movie->title); ?></p>
                <p class="text-sm text-yellow-400 mb-1">
                    Rating:
                    <?php for($i = 0; $i < $movie->rating; $i++): ?> ★ <?php endfor; ?>
                    <?php for($i = $movie->rating; $i < 5; $i++): ?> ☆ <?php endfor; ?>
                </p>
                <p class="text-gray-300 text-sm mb-1"><span class="font-semibold">Review:</span> <?php echo e($movie->review); ?></p>
                <p class="text-xs text-gray-500"></p>
            </div>
        </div>
    </div>

    
    <form action="<?php echo e(route('movies.update', $movie->id)); ?>" method="POST" enctype="multipart/form-data" class="bg-gray-900 p-6 rounded-lg shadow-lg space-y-4">
        <?php echo csrf_field(); ?>
        <?php echo method_field('PUT'); ?>

        <div>
            <label class="block font-bold mb-2">Title:</label>
            <input type="text" name="title" value="<?php echo e($movie->title); ?>" class="w-full p-2 rounded bg-gray-800 text-white" required>
        </div>

        <div>
            <label class="block font-bold mb-2">Rating (1-5):</label>
            <input type="number" name="rating" value="<?php echo e($movie->rating); ?>" min="1" max="5" class="w-full p-2 rounded bg-gray-800 text-white" required>
        </div>

        <div>
            <label class="block font-bold mb-2">Review:</label>
            <textarea name="review" rows="4" class="w-full p-2 rounded bg-gray-800 text-white" required><?php echo e($movie->review); ?></textarea>
        </div>

        <div>
            <label class="block font-bold mb-2">Current Poster:</label>
            <?php if($movie->image): ?>
                <img src="<?php echo e(asset('storage/' . $movie->image)); ?>" class="w-32 rounded mb-3">
            <?php else: ?>
                <p class="text-gray-400">No image uploaded</p>
            <?php endif; ?>
        </div>

        <div>
            <label class="block font-bold mb-2">Change Poster (optional):</label>
            <input type="file" name="image" accept="image/*" class="w-full p-2 bg-gray-800 text-white rounded">
        </div>

        <button type="submit" class="w-full bg-pink-600 hover:bg-pink-700 text-white font-bold py-2 rounded transition">
            💾 Update Movie
        </button>
    </form>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\Users\user\Ubina_Quiz\resources\views/movies/edit.blade.php ENDPATH**/ ?>