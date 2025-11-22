<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Accounts — BankingApp</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">
    <style>
        :root {
            --bg-1: #071733;
            --bg-2: #0f2a54;
            --accent: #d4af37;
            --muted: rgba(255, 255, 255, 0.85);
            --card-bg: rgba(255, 255, 255, 0.02)
        }

        body {
            background: linear-gradient(120deg, var(--bg-1) 0%, var(--bg-2) 60%);
            color: var(--muted);
            font-family: Inter, system-ui, Segoe UI, Roboto, Arial;
            padding: 1.25rem;
        }

        .card-pro {
            background: linear-gradient(180deg, rgba(255, 255, 255, 0.02), rgba(255, 255, 255, 0.01));
            border: 1px solid rgba(255, 255, 255, 0.04);
        }

        .btn-gold {
            background: linear-gradient(90deg, var(--accent), #ffd66b);
            color: #071733;
            border: none;
        }

        .form-control.bg-dark {
            background: rgba(255, 255, 255, 0.03);
            border: 1px solid rgba(255, 255, 255, 0.04);
            color: var(--muted);
        }

        .account-card {
            border-radius: 10px;
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="row">
            <div class="col-12 mb-3 d-flex justify-content-between align-items-center">
                <h3 class="mb-0">Multiple Digital Accounts</h3>
                <div>
                    <a class="btn btn-outline-light me-2" href="{{ route('dashboard.view') }}">Cancel</a>
                    <button id="addAccountBtn" class="btn btn-gold">Add Selected Account</button>
                </div>
            </div>
        </div>

        <div class="row g-4">
            <div class="col-lg-4">
                <div class="card card-pro p-3">
                    <h6 class="section-title mb-3 text-white">Choose account to add</h6>
                    <div class="mb-3">
                        <label class="form-label small muted text-white-50">Available accounts</label>
                        <select id="accountsSelect" class="form-select form-control bg-dark text-white">
                            <option value="" selected disabled>Select an account</option>
                            <option value="savings">Savings Account — ****1234</option>
                            <option value="checking">Checking Account — ****5678</option>
                            <option value="card_visa">Visa Card — ****9012</option>
                            <option value="card_master">Mastercard — ****3456</option>
                        </select>
                    </div>

                    <div class="small muted text-white-50">Selected accounts will appear on the right. Click an account
                        to reveal actions.</div>
                </div>
            </div>

            <div class="col-lg-8">
                <div class="card card-pro p-3">
                    <h6 class="section-title mb-3 text-white">Your linked accounts</h6>

                    <div id="linkedAccounts" class="row g-3">
                        <!-- dynamically added account cards go here -->
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        (function() {
            const select = document.getElementById('accountsSelect');
            const addBtn = document.getElementById('addAccountBtn');
            const list = document.getElementById('linkedAccounts');

            // map values to display data
            const accountData = {
                'savings': {
                    title: 'Savings Account',
                    subtitle: 'Available balance: $12,345.67',
                    id: 'savings'
                },
                'checking': {
                    title: 'Checking Account',
                    subtitle: 'Available balance: $2,345.67',
                    id: 'checking'
                },
                'card_visa': {
                    title: 'Visa Card',
                    subtitle: 'Credit limit: $5,000',
                    id: 'card_visa'
                },
                'card_master': {
                    title: 'Mastercard',
                    subtitle: 'Credit limit: $7,500',
                    id: 'card_master'
                },
            };

            function createAccountCard(key) {
                const data = accountData[key];
                if (!data) return null;

                // avoid duplicates
                if (document.getElementById('acct-' + data.id)) return null;

                const col = document.createElement('div');
                col.className = 'col-12 account-card';
                col.innerHTML = `
                    <div id="acct-${data.id}" class="d-flex align-items-center justify-content-between p-3" style="background:rgba(255,255,255,0.02);border:1px solid rgba(255,255,255,0.03);border-radius:10px;">
                        <div>
                            <div class="fw-bold text-white" data-role="title">${data.title}</div>
                            <div class="small muted text-white-50 mt-1">${data.subtitle}</div>
                        </div>
                        <div class="d-flex gap-2">
                            <button class="btn btn-outline-light btn-sm edit-btn" data-id="${data.id}" title="Edit"><i class="bi bi-pencil"></i></button>
                            <button class="btn btn-success btn-sm save-btn d-none" data-id="${data.id}" title="Save"><i class="bi bi-check"></i></button>
                            <button class="btn btn-outline-danger btn-sm delete-btn" data-id="${data.id}" title="Delete"><i class="bi bi-trash"></i></button>
                        </div>
                    </div>
                `;

                // attach handlers
                const deleteBtn = col.querySelector('.delete-btn');
                const editBtn = col.querySelector('.edit-btn');
                const saveBtn = col.querySelector('.save-btn');

                deleteBtn.addEventListener('click', () => {
                    col.remove();
                });

                editBtn.addEventListener('click', () => {
                    const titleEl = col.querySelector('[data-role="title"]');
                    const current = titleEl.textContent.trim();

                    // create input
                    const input = document.createElement('input');
                    input.type = 'text';
                    input.value = current;
                    input.className = 'form-control form-control-sm bg-dark text-white';
                    input.style.minWidth = '220px';

                    titleEl.replaceWith(input);
                    input.focus();

                    editBtn.classList.add('d-none');
                    saveBtn.classList.remove('d-none');

                    // save on Enter key
                    input.addEventListener('keydown', (e) => {
                        if (e.key === 'Enter') {
                            e.preventDefault();
                            saveBtn.click();
                        }
                        if (e.key === 'Escape') {
                            // cancel edit
                            input.replaceWith(titleEl);
                            editBtn.classList.remove('d-none');
                            saveBtn.classList.add('d-none');
                        }
                    });
                });

                saveBtn.addEventListener('click', () => {
                    const input = col.querySelector('input');
                    if (!input) return;
                    const newVal = input.value.trim();
                    if (!newVal) {
                        alert('Title cannot be empty');
                        input.focus();
                        return;
                    }

                    const newTitleDiv = document.createElement('div');
                    newTitleDiv.className = 'fw-bold text-white';
                    newTitleDiv.setAttribute('data-role', 'title');
                    newTitleDiv.textContent = newVal;

                    input.replaceWith(newTitleDiv);

                    editBtn.classList.remove('d-none');
                    saveBtn.classList.add('d-none');
                });

                return col;
            }

            addBtn.addEventListener('click', () => {
                const key = select.value;
                if (!key) return alert('Please select an account to add.');

                const card = createAccountCard(key);
                if (card) list.prepend(card);
            });

            // allow adding on Enter from select (keyboard)
            select.addEventListener('keydown', (e) => {
                if (e.key === 'Enter') {
                    e.preventDefault();
                    addBtn.click();
                }
            });
        })();
    </script>
</body>

</html>
