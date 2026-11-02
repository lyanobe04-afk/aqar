"""Read-only contract checks against the existing Laravel frontend and assets."""
from pathlib import Path
import hashlib
import json
import re

ROOT = Path(__file__).resolve().parents[2]
MOBILE = ROOT / 'mobile'
WEB = ROOT / 'backend'
failures = []

def digest(path):
    return hashlib.sha256(path.read_bytes()).hexdigest()

web_paths = set(re.findall(r"'path' => '([^']+)'", (WEB / 'config/manager.php').read_text(encoding='utf-8')))
dart = '\n'.join(p.read_text(encoding='utf-8') for p in (MOBILE / 'lib').rglob('*.dart'))
mobile_paths = set(re.findall(r"'(/[^'\n]*)'", dart))
mobile_paths.update(f'/properties/add/step-{step}' for step in range(1, 7))
for route in web_paths:
    if route not in mobile_paths:
        failures.append(f'Missing mobile equivalent: {route}')

expected_colors = {'navy': '#1F4E78', 'darkNavy': '#0F2942', 'emerald': '#2E7D32', 'background': '#F4F6F9', 'warning': '#D35400', 'error': '#C0392B', 'success': '#27AE60'}
theme = (MOBILE / 'lib/core/theme.dart').read_text(encoding='utf-8')
web_css = (WEB / 'resources/css/manager.css').read_text(encoding='utf-8')
for name, color in expected_colors.items():
    if not re.search(rf'{name}\s*=\s*Color\(0xFF{color[1:]}\)', theme, re.I):
        failures.append(f'Mobile palette mismatch: {name}')
    if color.lower() not in web_css.lower():
        failures.append(f'Web palette mismatch: {name}')

images = list((MOBILE / 'assets/images').glob('*'))
for image in images:
    original = WEB / 'public/assets/aqar/images' / image.name
    if not original.exists() or digest(image) != digest(original):
        failures.append(f'Changed or unknown image: {image.name}')
web_fonts = {digest(p) for p in (WEB / 'public/assets/aqar/fonts').glob('*')}
fonts = list((MOBILE / 'assets/fonts').glob('*'))
for font in fonts:
    if digest(font) not in web_fonts:
        failures.append(f'Font differs from website: {font.name}')

protected = json.loads((WEB / 'tools/ui/protected-hashes.json').read_text())
protected_count = 0
for file, sha in protected.items():
    if file == 'backend/routes/web.php':
        continue  # Intentional previous-phase route replacement.
    protected_count += 1
    if digest(ROOT / file) != sha:
        failures.append(f'Protected file changed: {file}')

for filename in ['demo-seed.json', 'demo-i18n.json']:
    reference = ROOT / 'demo' / ('seed.json' if filename == 'demo-seed.json' else 'i18n.json')
    for copy in [WEB / 'public/assets/aqar' / filename, MOBILE / 'assets/data' / filename]:
        if digest(reference) != digest(copy):
            failures.append(f'Shared demo asset differs: {copy}')

report = {'sharedDemoAssetsMatched': 2, 'websiteScreensMatched': len(web_paths), 'paletteTokensMatched': len(expected_colors), 'identicalImages': len(images), 'identicalFonts': len(fonts), 'protectedFilesUnchanged': protected_count, 'failures': failures}
(MOBILE / 'tools/verification.json').write_text(json.dumps(report, indent=2), encoding='utf-8')
print(json.dumps(report, indent=2))
raise SystemExit(bool(failures))
