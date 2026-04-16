import bs4
import re
import json

with open('Oracle-belline.htm', 'r', encoding='latin1') as f:
    soup = bs4.BeautifulSoup(f.read(), 'html.parser')

sections = [
    "Les lames qui ne sont pas sous influence planétaire",
    "Les lames sous influence du Soleil",
    "Les lames sous influence de la Lune",
    "Les lames sous influence de Mercure",
    "Les lames sous influence de Vénus",
    "Les lames sous influence de Mars",
    "Les lames sous influence de Jupiter",
    "Les lames sous influence de Saturne"
]

data = {s: "" for s in sections}

for div in soup.find_all('div', style=re.compile('position:absolute;')):
    text_content = div.get_text(separator=' ', strip=True)
    for section in sections:
        if text_content.startswith(section):
            # Clean up the text
            clean_text = text_content[len(section):].strip()
            # If the div just contains the title, let's look at nearby elements or just text
            if len(clean_text) < 10:
               # It's probably just a title, we need a better extraction method
               pass

# Let's try finding the title, then grabbing the next text block
extracted = {}
for section in sections:
    # Find the tag containing the section name
    element = soup.find(lambda tag: tag.name in ['div', 'span'] and section in tag.text)
    if element:
        # Find the parent div that likely contains the whole block
        # Or just get all text after this element until the next section
        pass

# A simpler approach: use regex on the raw HTML text
with open('Oracle-belline.htm', 'r', encoding='latin1') as f:
    raw_html = f.read()

# Strip tags to get plain text, but keep some structure
soup2 = bs4.BeautifulSoup(raw_html, 'html.parser')
all_text = soup2.get_text(separator='\n', strip=True)

import re
import json

results = {}
for i in range(len(sections)):
    start_str = sections[i]
    end_str = sections[i+1] if i + 1 < len(sections) else "En savoir plus"

    start_idx = all_text.find(start_str)
    end_idx = all_text.find(end_str, start_idx) if end_str != "En savoir plus" else len(all_text)

    if start_idx != -1:
        extracted_text = all_text[start_idx + len(start_str):end_idx].strip()
        # Clean up some common artifacts
        extracted_text = re.sub(r'\n+', '\n', extracted_text)
        # Remove navigation elements that might have sneaked in
        extracted_text = re.sub(r'Retour à l\'accueil.*', '', extracted_text, flags=re.DOTALL)
        results[start_str] = extracted_text.strip()

with open('lames_descriptions.json', 'w', encoding='utf-8') as f:
    json.dump(results, f, indent=4, ensure_ascii=False)

for k, v in results.items():
    print(f"[{k}]")
    print(v[:100] + "..." if len(v) > 100 else v)
    print("-" * 40)
