<style>
:root {
    --primary-gold: #FFD700;
    --platinum: #E5E4E2;
    --white: #FFFFFF;
    --gray: #A9A9A9;
}
body {
    background: linear-gradient(135deg, var(--white) 60%, var(--platinum) 100%);
    color: var(--gray);
    font-family: 'Segoe UI', Arial, sans-serif;
}
.header {
    background: var(--primary-gold);
    color: var(--white);
    padding: 2rem 0;
    text-align: center;
    box-shadow: 0 2px 8px var(--platinum);
}
.services {
    background: var(--white);
    color: var(--gray);
    padding: 2rem 0;
    border-radius: 12px;
    box-shadow: 0 2px 8px var(--platinum);
    margin: 2rem auto;
    max-width: 900px;
}
.contact {
    background: var(--platinum);
    color: var(--gray);
    padding: 2rem 0;
    border-radius: 12px;
    box-shadow: 0 2px 8px var(--primary-gold);
    margin: 2rem auto;
    max-width: 900px;
}
input, textarea {
    border: 1px solid var(--gray);
    border-radius: 6px;
    padding: 0.5rem;
    margin-bottom: 1rem;
    width: 100%;
}
button {
    background: var(--primary-gold);
    color: var(--white);
    border: none;
    border-radius: 6px;
    padding: 0.75rem 2rem;
    font-weight: bold;
    cursor: pointer;
    transition: background 0.2s;
}
button:hover {
    background: #e6b800;
}
</style>
