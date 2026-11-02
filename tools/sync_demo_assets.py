"""Copy the canonical demo seed/translations to each isolated frontend."""
from pathlib import Path
import shutil
import json
ROOT = Path(__file__).resolve().parents[1]
seed_path=ROOT/'demo/seed.json'
seed=json.loads(seed_path.read_text(encoding='utf-8'))
seed['global']=json.loads((ROOT/'demo/global.json').read_text(encoding='utf-8'))
translations=json.loads((ROOT/'demo/i18n.json').read_text(encoding='utf-8'))
translations.update(json.loads((ROOT/'demo/handover-i18n.json').read_text(encoding='utf-8')))
translations.update(json.loads((ROOT/'demo/presentation-i18n.json').read_text(encoding='utf-8')))
(ROOT/'demo/i18n.json').write_text(json.dumps(translations,ensure_ascii=False,indent=2)+'\n',encoding='utf-8')
localized=translations.get('_locales',{})
for code in seed['global']['languages']:
    if code not in ['en','ar'] and (code not in localized or not localized[code]):
        raise ValueError(f'No interface translations supplied for language: {code}')
seed_path.write_text(json.dumps(seed,ensure_ascii=False,indent=2)+'\n',encoding='utf-8')
for source, target in [('seed.json','demo-seed.json'),('i18n.json','demo-i18n.json')]:
    for folder in ['backend/public/assets/aqar','mobile/assets/data']:
        destination=ROOT/folder/target
        destination.parent.mkdir(parents=True,exist_ok=True)
        shutil.copyfile(ROOT/'demo'/source,destination)
print('Canonical seed and translations copied to both frontends. Runtime changes remain isolated.')
