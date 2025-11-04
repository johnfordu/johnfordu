<?php $__env->startSection('content'); ?>
<div>
    <h2 class="text-3xl font-bold mb-6 glow-text"> Featured Movies</h2>

    <?php if(session('success')): ?>
        <div class="bg-green-700 text-white p-3 mb-6 rounded">
            <?php echo e(session('success')); ?>

        </div>
    <?php endif; ?>

    
    <div class="relative">
        <button id="scrollLeft" class="absolute left-0 top-1/2 transform -translate-y-1/2 z-10 bg-black/70 hover:bg-black text-white rounded-full w-10 h-10 flex items-center justify-center shadow-lg">
            ‹
        </button>

        <div id="movieRow" class="flex space-x-6 overflow-x-auto scroll-smooth no-scrollbar px-2">
            <?php $__empty_1 = true; $__currentLoopData = $movies; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $movie): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
            <div class="min-w-[200px] movie-card bg-[#141414] rounded-lg overflow-hidden shadow-lg hover:shadow-red-500/40 transition duration-500">
                <?php if($movie->image): ?>
                    <img src="<?php echo e(asset('storage/' . $movie->image)); ?>" alt="Poster" class="w-full h-64 object-cover">
                <?php else: ?>
                    <div class="bg-gray-700 h-64 flex items-center justify-center text-gray-400">No Image</div>
                <?php endif; ?>

                <div class="p-3">
                    <h3 class="text-md font-bold mb-1 truncate"><?php echo e($movie->title); ?></h3>
                    <p class="text-yellow-400 mb-2 text-sm">
                        <?php for($i = 0; $i < $movie->rating; $i++): ?> ★ <?php endfor; ?>
                        <?php for($i = $movie->rating; $i < 5; $i++): ?> ☆ <?php endfor; ?>
                    </p>
                    <p class="text-xs text-gray-400 mb-3 line-clamp-2"><?php echo e($movie->review); ?></p>
                    <div class="flex justify-between text-xs">
                        <a href="<?php echo e(route('movies.edit', $movie->id)); ?>" class="text-blue-400 hover:underline">Edit</a>
                        <form action="<?php echo e(route('movies.destroy', $movie->id)); ?>" method="POST">
                            <?php echo csrf_field(); ?>
                            <?php echo method_field('DELETE'); ?>
                            <button type="submit" class="text-red-500 hover:underline">Delete</button>
                        </form>
                    </div>
                </div>
            </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
            <p class="text-gray-400 text-center">No movies yet. Add one to start!</p>
            <?php endif; ?>
        </div>

        <button id="scrollRight" class="absolute right-0 top-1/2 transform -translate-y-1/2 z-10 bg-black/70 hover:bg-black text-white rounded-full w-10 h-10 flex items-center justify-center shadow-lg">
            ›
        </button>
    </div>
</div>

<style>
    /* Hide scrollbar but allow scroll */
    .no-scrollbar::-webkit-scrollbar {
        display: none;
    }
    .no-scrollbar {
        -ms-overflow-style: none;
        scrollbar-width: none;
    }

    .movie-card {
        transition: transform 0.4s ease, box-shadow 0.4s ease;
    }

    .movie-card:hover {
        transform: scale(1.08);
        box-shadow: 0 0 20px rgba(255, 0, 0, 0.5);
    }

    @keyframes fadeIn {
        from { opacity: 0; transform: translateY(20px); }
        to { opacity: 1; transform: translateY(0); }
    }

    .animate-fadeIn {
        animation: fadeIn 0.8s ease-in-out;
    }
</style>

<script>
    const row = document.getElementById('movieRow');
    const left = document.getElementById('scrollLeft');
    const right = document.getElementById('scrollRight');

    left.addEventListener('click', () => {
        row.scrollBy({ left: -400, behavior: 'smooth' });
    });

    right.addEventListener('click', () => {
        row.scrollBy({ left: 400, behavior: 'smooth' });
    });
</script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\Users\user\Ubina_Quiz\resources\views/movies/index.blade.php ENDPATH**/ ?>