import re

with open('wordpress-theme/belline/style.css', 'r') as f:
    content = f.read()

# Make sure all .carte-img have the same width
css_addition = """
.carte-img {
    width: 100px; /* Force uniform width for all cards */
    height: auto;
    border-radius: 5px;
    box-shadow: 0 2px 4px rgba(0,0,0,0.3);
}

.cartes-grid {
    display: grid;
    grid-template-columns: repeat(4, 1fr);
    gap: 20px;
    justify-items: center; /* Center the cards in their grid cells */
}
"""

if '.carte-img {' not in content:
    content += css_addition

with open('wordpress-theme/belline/style.css', 'w') as f:
    f.write(content)
