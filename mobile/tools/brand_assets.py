"""Render the existing simple Aqar building mark as native launcher assets.

Uses only Python's standard library and writes only generated mobile scaffolding.
"""
from pathlib import Path
import json
import struct
import zlib

ROOT = Path(__file__).resolve().parents[1]

def icon(size):
    rows = bytearray()
    for y in range(size):
        rows.append(0)
        for x in range(size):
            u, v = x / size, y / size
            color = (31, 78, 120)
            if .29 <= u < .55 and .23 <= v < .77:
                color = (255, 255, 255)
            if .55 <= u < .72 and .4 <= v < .77:
                color = (232, 243, 233)
            if .25 <= u < .76 and .75 <= v < .8:
                color = (255, 255, 255)
            for wx in (.34, .45, .6):
                for wy in (.32, .44, .56, .68):
                    if wx <= u < wx + .045 and wy <= v < wy + .05:
                        color = (46, 125, 50) if wx == .6 else (31, 78, 120)
            rows.extend(color)
    def chunk(tag, data):
        return struct.pack('>I', len(data)) + tag + data + struct.pack('>I', zlib.crc32(tag + data))
    return b'\x89PNG\r\n\x1a\n' + chunk(b'IHDR', struct.pack('>IIBBBBB', size, size, 8, 2, 0, 0, 0)) + chunk(b'IDAT', zlib.compress(rows, 9)) + chunk(b'IEND', b'')

targets = list((ROOT / 'android/app/src/main/res').glob('mipmap-*/ic_launcher.png'))
targets += list((ROOT / 'ios/Runner/Assets.xcassets/AppIcon.appiconset').glob('*.png'))
targets += list((ROOT / 'web/icons').glob('*.png')) + [ROOT / 'web/favicon.png']
for target in targets:
    size = struct.unpack('>I', target.read_bytes()[16:20])[0]
    target.write_bytes(icon(size))

manifest = ROOT / 'web/manifest.json'
data = json.loads(manifest.read_text())
data.update(name='Aqar Property Portal · Demo', short_name='Aqar Demo', background_color='#F4F6F9', theme_color='#1F4E78', description='Static Aqar mobile frontend preview.')
manifest.write_text(json.dumps(data, ensure_ascii=False, indent=2), encoding='utf-8')
print(f'Branded {len(targets)} generated mobile icons.')
