<div x-show="isProductModalOpen" x-cloak x-on:keydown.escape.window="closeModal()" x-transition.opacity
    class="fixed inset-0 z-[70] overflow-y-auto bg-black/60 p-4">
    <div class="mx-auto mt-16 max-w-3xl" x-on:click.outside="closeModal()">
        <div class="menu-section-card overflow-hidden bg-white">
            <template x-if="selectedProduct">
                <div>
                    <div class="relative">
                        <img x-bind:src="selectedProduct.image" x-bind:alt="selectedProduct.name" width="1400"
                            height="900" class="h-60 w-full object-cover md:h-80">
                        <button type="button" x-on:click="closeModal()"
                            class="absolute right-4 top-4 inline-flex h-10 w-10 items-center justify-center rounded-full bg-white/90 text-brand-bg shadow-lg backdrop-blur">
                            <i class="fa-solid fa-xmark"></i>
                        </button>
                    </div>

                    <div class="space-y-5 p-6 md:p-8">
                        <div>
                            <p class="menu-subtitle text-sm font-bold uppercase tracking-wide text-brand-green"
                                x-text="selectedProduct.category.name"></p>
                            <h3 class="menu-title mt-1 text-3xl font-black text-brand-bg" x-text="selectedProduct.name">
                            </h3>
                            <p class="menu-description mt-2 text-sm leading-relaxed text-brand-ink/80"
                                x-text="selectedProduct.description"></p>
                        </div>

                        <div>
                            <p class="mb-2 text-sm font-bold uppercase tracking-wide text-brand-wood">Ingredientes</p>
                            <div class="flex flex-wrap gap-2">
                                <template x-for="ingredient in selectedProduct.ingredients" :key="ingredient">
                                    <span
                                        class="pill-chip bg-brand-paper px-3 py-1 text-xs font-semibold text-brand-ink"
                                        x-text="ingredient"></span>
                                </template>
                            </div>
                        </div>

                        <div>
                            <p class="menu-subtitle mb-3 text-sm font-bold uppercase tracking-wide text-brand-wood">
                                Tabela de preços
                            </p>

                            <div class="overflow-hidden rounded-2xl border border-brand-wood/15 bg-brand-paper/70">
                                <template x-if="selectedProduct.prices && selectedProduct.prices.length">
                                    <div>
                                        <template x-for="row in selectedProduct.prices" :key="row.label">
                                            <div
                                                class="flex items-center justify-between border-b border-brand-wood/10 px-4 py-3 last:border-none">
                                                <p class="menu-subtitle text-sm font-semibold text-brand-ink"
                                                    x-text="row.label"></p>
                                                <p class="menu-value text-base font-black text-brand-red">R$ <span
                                                        x-text="row.price"></span></p>
                                            </div>
                                        </template>
                                    </div>
                                </template>

                                <template x-if="!selectedProduct.prices || !selectedProduct.prices.length">
                                    <div class="flex items-center justify-between px-4 py-3">
                                        <p class="menu-subtitle text-sm font-semibold text-brand-ink">Preço</p>
                                        <p class="menu-value text-base font-black text-brand-red">R$ <span
                                                x-text="selectedProduct.base_price"></span></p>
                                    </div>
                                </template>
                            </div>
                        </div>
                    </div>
                </div>
            </template>
        </div>
    </div>
</div>