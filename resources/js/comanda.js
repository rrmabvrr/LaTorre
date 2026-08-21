/* ============================================
   LA TORRE PIZZARIA - COMANDA (ORDER PANEL)
   ============================================ */

document.addEventListener('DOMContentLoaded', () => {

    // ============================================
    // State
    // ============================================
    let comandaItems = JSON.parse(localStorage.getItem('latorre_comanda') || '[]');

    function normalizeComandaItems(items) {
        return items.map(item => {
            const isPizza = Boolean(item.isPizza) || / - (MÉDIA|GRANDE|FAMÍLIA|BIG)$/.test(String(item.name || ''));
            const isExtra = Boolean(item.isExtra) || String(item.name || '') === (window.extraBatataConfig?.name || 'ADICIONAL DE BATATAS');

            return {
                ...item,
                price: Number(item.price || 0),
                qty: Number(item.qty || 1),
                isPizza,
                isExtra,
            };
        });
    }

    comandaItems = normalizeComandaItems(comandaItems);

    // ============================================
    // DOM Elements
    // ============================================
    const toggle = document.getElementById('comanda-toggle');
    const panel = document.getElementById('comanda-panel');
    const overlay = document.getElementById('comanda-overlay');
    const closeBtn = document.getElementById('comanda-close');
    const badge = document.getElementById('comanda-badge');
    const itemsList = document.getElementById('comanda-items');
    const emptyState = document.getElementById('comanda-empty');
    const footer = document.getElementById('comanda-footer');
    const totalValue = document.getElementById('comanda-total-value');
    const obsTextarea = document.getElementById('comanda-obs');
    const sendBtn = document.getElementById('comanda-send');
    const clearBtn = document.getElementById('comanda-clear');
    const addButtons = document.querySelectorAll('.btn-add-comanda');
    const extraToggle = document.getElementById('comanda-extra-batata');
    const extraLabel = document.getElementById('comanda-extra-label');
    const extraPrice = document.getElementById('comanda-extra-price');
    const extraWrap = document.getElementById('comanda-extra');
    const extraConfig = window.extraBatataConfig || { name: 'ADICIONAL DE BATATAS', price: 7.00 };

    function getExtraBatataItem() {
        return {
            name: String(extraConfig.name || 'ADICIONAL DE BATATAS').toUpperCase(),
            price: Number(extraConfig.price || 7.00),
            qty: 1,
            isPizza: false,
            isExtra: true,
        };
    }

    function syncExtraBatataState() {
        if (!extraToggle) {
            return;
        }

        const extraItem = getExtraBatataItem();
        const hasPizza = comandaItems.some(item => item.isPizza || / - (MÉDIA|GRANDE|FAMÍLIA|BIG)$/.test(String(item.name || '')));
        const extraIndex = comandaItems.findIndex(item => item.isExtra === true && item.name === extraItem.name);

        if (!hasPizza) {
            if (extraIndex >= 0) {
                comandaItems.splice(extraIndex, 1);
            }
            extraToggle.checked = false;
            return;
        }

        if (extraToggle.checked && extraIndex === -1) {
            comandaItems.push({ ...extraItem, isExtra: true, isPizza: false, qty: 1 });
        }

        if (!extraToggle.checked && extraIndex >= 0) {
            comandaItems.splice(extraIndex, 1);
        }

        extraToggle.checked = comandaItems.some(item => item.isExtra === true && item.name === extraItem.name);
    }

    // ============================================
    // Panel Open / Close
    // ============================================
    function openPanel() {
        panel.classList.add('open');
        overlay.classList.add('open');
        document.body.style.overflow = 'hidden';
    }

    function closePanel() {
        panel.classList.remove('open');
        overlay.classList.remove('open');
        document.body.style.overflow = '';
    }

    toggle.addEventListener('click', openPanel);
    closeBtn.addEventListener('click', closePanel);
    overlay.addEventListener('click', closePanel);

    // Close on ESC
    document.addEventListener('keydown', (e) => {
        if (e.key === 'Escape' && panel.classList.contains('open')) {
            closePanel();
        }
    });

    // ============================================
    // Add Item to Comanda
    // ============================================
    addButtons.forEach(btn => {
        btn.addEventListener('click', () => {
            const card = btn.closest('.menu-card');
            const sizeCheckboxes = card ? card.querySelectorAll('.pizza-size-checkbox') : [];
            const messageBox = card ? card.querySelector('.pizza-size-message') : null;

            let name = btn.dataset.name || btn.dataset.baseName || 'Item';
            let price = parseFloat(btn.dataset.price || '0');

            if (sizeCheckboxes.length > 0) {
                const checkedSize = [...sizeCheckboxes].find(checkbox => checkbox.checked);

                if (!checkedSize) {
                    if (messageBox) {
                        messageBox.textContent = 'SELECIONE UM TAMANHO ANTES DE ADICIONAR.';
                        messageBox.classList.add('visible');
                    }
                    return;
                }

                const sizeName = checkedSize.dataset.size;
                const sizePrice = parseFloat(checkedSize.dataset.price || '0');
                name = `${name} - ${sizeName}`;
                price = sizePrice;
                if (messageBox) {
                    messageBox.textContent = '';
                    messageBox.classList.remove('visible');
                }
            }

            const existing = comandaItems.find(item => item.name === name);
            if (existing) {
                existing.qty += 1;
            } else {
                comandaItems.push({ name, price, qty: 1, isPizza: sizeCheckboxes.length > 0 });
            }

            saveAndRender();
            animateAddButton(btn);
            pulseToggle();
        });
    });

    document.querySelectorAll('.pizza-size-checkbox').forEach(checkbox => {
        checkbox.addEventListener('change', () => {
            const card = checkbox.closest('.menu-card');
            if (!card) return;

            const messageBox = card.querySelector('.pizza-size-message');
            if (messageBox) {
                messageBox.textContent = '';
                messageBox.classList.remove('visible');
            }

            if (!checkbox.checked) return;

            card.querySelectorAll('.pizza-size-checkbox').forEach(other => {
                if (other !== checkbox) {
                    other.checked = false;
                }
            });
        });
    });

    // ============================================
    // Button feedback animation
    // ============================================
    function animateAddButton(btn) {
        // Text feedback
        const originalText = btn.textContent;
        btn.textContent = '✓ Adicionado';
        btn.classList.add('added');
        btn.disabled = true;

        // Flying badge animation
        const rect = btn.getBoundingClientRect();
        const toggleRect = toggle.getBoundingClientRect();
        const fly = document.createElement('div');
        fly.className = 'comanda-fly-badge';
        fly.textContent = '+1';
        fly.style.left = rect.left + rect.width / 2 + 'px';
        fly.style.top = rect.top + 'px';
        document.body.appendChild(fly);

        // Animate to the toggle
        requestAnimationFrame(() => {
            fly.style.left = toggleRect.left + toggleRect.width / 2 + 'px';
            fly.style.top = toggleRect.top + toggleRect.height / 2 + 'px';
            fly.style.opacity = '0';
            fly.style.transform = 'scale(0.3)';
        });

        setTimeout(() => fly.remove(), 700);

        setTimeout(() => {
            btn.textContent = originalText;
            btn.classList.remove('added');
            btn.disabled = false;
        }, 1200);
    }

    function pulseToggle() {
        toggle.classList.add('pulse');
        setTimeout(() => toggle.classList.remove('pulse'), 600);
    }

    // ============================================
    // Render Comanda
    // ============================================
    if (extraToggle) {
        extraToggle.addEventListener('change', () => {
            syncExtraBatataState();
            saveAndRender();
        });
    }

    function renderComanda() {
        comandaItems = normalizeComandaItems(comandaItems);

        if (extraToggle) {
            const extraItem = getExtraBatataItem();

            if (extraLabel) {
                extraLabel.textContent = extraItem.name;
            }

            if (extraPrice) {
                extraPrice.textContent = `R$ ${extraItem.price.toFixed(2).replace('.', ',')}`;
            }

            syncExtraBatataState();

            if (extraWrap) {
                extraWrap.style.display = comandaItems.some(item => item.isPizza || / - (MÉDIA|GRANDE|FAMÍLIA|BIG)$/.test(String(item.name || ''))) ? 'block' : 'none';
            }
        }

        // Badge
        const totalQty = comandaItems.reduce((sum, item) => sum + item.qty, 0);
        badge.textContent = totalQty;
        badge.classList.toggle('has-items', totalQty > 0);
        toggle.classList.toggle('has-items', totalQty > 0);

        // Empty state
        if (comandaItems.length === 0) {
            emptyState.style.display = 'flex';
            itemsList.style.display = 'none';
            footer.style.display = 'none';
            return;
        }

        emptyState.style.display = 'none';
        itemsList.style.display = 'block';
        footer.style.display = 'block';

        // Items list
        itemsList.innerHTML = '';
        comandaItems.forEach((item, index) => {
            const li = document.createElement('li');
            li.className = 'comanda-item';
            li.innerHTML = `
                <div class="comanda-item-info">
                    <span class="comanda-item-name">${item.name}</span>
                    <span class="comanda-item-price">R$ ${(item.price * item.qty).toFixed(2).replace('.', ',')}</span>
                </div>
                <div class="comanda-item-controls">
                    <button type="button" class="comanda-qty-btn minus" data-index="${index}" aria-label="Diminuir quantidade">−</button>
                    <span class="comanda-item-qty">${item.qty}</span>
                    <button type="button" class="comanda-qty-btn plus" data-index="${index}" aria-label="Aumentar quantidade">+</button>
                    <button type="button" class="comanda-remove-btn" data-index="${index}" aria-label="Remover item">
                        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" width="16" height="16">
                            <polyline points="3 6 5 6 21 6"></polyline>
                            <path d="M19 6v14a2 2 0 01-2 2H7a2 2 0 01-2-2V6m3 0V4a2 2 0 012-2h4a2 2 0 012 2v2"></path>
                        </svg>
                    </button>
                </div>
            `;

            // Stagger entrance animation
            li.style.animationDelay = `${index * 0.05}s`;
            itemsList.appendChild(li);
        });

        // Bind quantity buttons
        itemsList.querySelectorAll('.comanda-qty-btn.minus').forEach(btn => {
            btn.addEventListener('click', () => {
                const idx = parseInt(btn.dataset.index);
                if (comandaItems[idx].qty > 1) {
                    comandaItems[idx].qty -= 1;
                } else {
                    comandaItems.splice(idx, 1);
                }
                saveAndRender();
            });
        });

        itemsList.querySelectorAll('.comanda-qty-btn.plus').forEach(btn => {
            btn.addEventListener('click', () => {
                const idx = parseInt(btn.dataset.index);
                comandaItems[idx].qty += 1;
                saveAndRender();
            });
        });

        itemsList.querySelectorAll('.comanda-remove-btn').forEach(btn => {
            btn.addEventListener('click', () => {
                const idx = parseInt(btn.dataset.index);
                const li = btn.closest('.comanda-item');
                li.classList.add('removing');
                setTimeout(() => {
                    comandaItems.splice(idx, 1);
                    saveAndRender();
                }, 300);
            });
        });

        // Total
        const total = comandaItems.reduce((sum, item) => sum + (item.price * item.qty), 0);
        totalValue.textContent = `R$ ${total.toFixed(2).replace('.', ',')}`;
    }

    // ============================================
    // Persist to localStorage
    // ============================================
    function saveAndRender() {
        localStorage.setItem('latorre_comanda', JSON.stringify(comandaItems));
        renderComanda();
    }

    // ============================================
    // Send via WhatsApp
    // ============================================
    sendBtn.addEventListener('click', () => {
        if (comandaItems.length === 0) return;

        let message = '🍕 *PEDIDO - La Torre Pizzaria*\n\n';

        comandaItems.forEach(item => {
            message += `• ${item.qty}x ${item.name} — R$ ${(item.price * item.qty).toFixed(2).replace('.', ',')}\n`;
        });

        const total = comandaItems.reduce((sum, item) => sum + (item.price * item.qty), 0);
        message += `\n💰 *Total: R$ ${total.toFixed(2).replace('.', ',')}*`;

        const obs = obsTextarea.value.trim();
        if (obs) {
            message += `\n\n📝 *Observações:* ${obs}`;
        }

        const encoded = encodeURIComponent(message);
        window.open(`https://wa.me/5595991428625?text=${encoded}`, '_blank');
    });

    // ============================================
    // Clear Comanda
    // ============================================
    clearBtn.addEventListener('click', () => {
        if (comandaItems.length === 0) return;

        // Confirm
        if (confirm('Tem certeza que deseja limpar a comanda?')) {
            comandaItems = [];
            obsTextarea.value = '';
            saveAndRender();
        }
    });

    // ============================================
    // Initial Render
    // ============================================
    renderComanda();

});
