<div class="flex items-center gap-2">
    @if ($isAdmin)
        <div class="relative flex items-center">
            <div class="flex items-center gap-1.5 text-xs font-semibold text-emerald-700 dark:text-emerald-400 bg-emerald-50 dark:bg-emerald-950/60 border border-emerald-300 dark:border-emerald-800 rounded-lg px-2.5 py-1.5 shadow-sm">
                <svg class="w-4 h-4 text-emerald-600 dark:text-emerald-400 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4" />
                </svg>
                <span class="hidden lg:inline text-gray-500 dark:text-gray-400 font-medium">Toko:</span>
                <select 
                    id="tenant-select" 
                    wire:change="switchTenant($event.target.value)"
                    class="bg-transparent font-bold text-gray-900 dark:text-gray-100 border-none outline-none focus:ring-0 cursor-pointer text-xs pr-4 py-0"
                >
                    @forelse ($tenants as $tenant)
                        <option value="{{ $tenant->id }}" @selected($tenant->id === $selectedTenantId) class="text-gray-900 bg-white dark:bg-zinc-800 dark:text-gray-100 font-medium">
                            {{ $tenant->businessProfile?->business_name ?: $tenant->name }} ({{ $tenant->name }})
                        </option>
                    @empty
                        <option value="" disabled class="text-gray-500">Belum ada toko terdaftar</option>
                    @endforelse
                </select>
            </div>
        </div>
    @elseif ($activeProfile)
        <div class="hidden sm:flex items-center gap-1.5 text-xs font-semibold text-emerald-700 dark:text-emerald-400 bg-emerald-50 dark:bg-emerald-950/40 border border-emerald-200/60 dark:border-emerald-800/40 rounded-lg px-2.5 py-1">
            <svg class="w-3.5 h-3.5 text-emerald-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4" />
            </svg>
            <span>{{ $activeProfile->business_name }}</span>
        </div>
    @endif
</div>

