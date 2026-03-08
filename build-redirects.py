import openpyxl

lines = []
lines.append("# Genetic Matrix - Full 301 Redirect Map")
lines.append("# Generated from Google Search Console indexing report")
lines.append("# 2026-03-08")
lines.append("# Add to .htaccess above existing RewriteRule lines")
lines.append("# Activate on Learn Hub launch day")
lines.append("")

# ============================================================
# ENGLISH EDUCATIONAL
# ============================================================
lines.append("# ============================================================")
lines.append("# ENGLISH EDUCATIONAL PAGES -> LEARN HUB")
lines.append("# ============================================================")
lines.append("")

en_edu = {
    "/info-center/": "/learn/",
    "/human-design-info-center/": "/learn/",
    "/human-design-has-the-answers-for-you/": "/learn/",
    "/human-design-what-else-will-i-know/": "/learn/",
    "/human-design-types/": "/learn/types/",
    "/human-design-generator/": "/learn/types/generator/",
    "/human-design-manifesting-generator/": "/learn/types/manifesting-generator/",
    "/human-design-manifestor/": "/learn/types/manifestor/",
    "/human-design-projector/": "/learn/types/projector/",
    "/human-design-reflector/": "/learn/types/reflector/",
    "/human-design-strategy/": "/learn/types/",
    "/generator-strategy/": "/learn/types/generator/",
    "/manifesting-generator-strategy/": "/learn/types/manifesting-generator/",
    "/manifestor-strategy/": "/learn/types/manifestor/",
    "/projector-strategy/": "/learn/types/projector/",
    "/reflector-strategy/": "/learn/types/reflector/",
    "/human-design-authority/": "/learn/",
    "/human-design-the-9-centers/": "/learn/centers/",
    "/human-design-head-center/": "/learn/centers/",
    "/human-design-ajna-center/": "/learn/centers/",
    "/human-design-throat-center/": "/learn/centers/",
    "/human-design-g-center/": "/learn/centers/",
    "/human-design-heart-center/": "/learn/centers/",
    "/human-design-sacral-center/": "/learn/centers/",
    "/human-design-solar-plexus-center/": "/learn/centers/",
    "/human-design-splenic-center/": "/learn/centers/",
    "/human-design-root-center/": "/learn/centers/",
    "/human-design-channels/": "/learn/channels/",
    "/human-design-gates/": "/learn/gates/",
    "/human-design-the-12-profiles/": "/learn/profiles/",
    "/human-design-1-3-profile/": "/learn/profiles/profile-1-3/",
    "/human-design-1-4-profile/": "/learn/profiles/profile-1-4/",
    "/human-design-2-4-profile/": "/learn/profiles/profile-2-4/",
    "/human-design-2-5-profile/": "/learn/profiles/profile-2-5/",
    "/human-design-3-5-profile/": "/learn/profiles/profile-3-5/",
    "/human-design-3-6-profile/": "/learn/profiles/profile-3-6/",
    "/human-design-4-1-profile/": "/learn/profiles/profile-4-1/",
    "/human-design-4-6-profile/": "/learn/profiles/profile-4-6/",
    "/human-design-5-1-profile/": "/learn/profiles/profile-5-1/",
    "/human-design-5-2-profile/": "/learn/profiles/profile-5-2/",
    "/human-design-6-2-profile/": "/learn/profiles/profile-6-2/",
    "/human-design-6-3-profile/": "/learn/profiles/profile-6-3/",
    "/human-design-incarnation-crosses/": "/learn/incarnation-cross/",
    "/human-design-incarnation-sun-table/": "/learn/incarnation-cross/",
    "/human-design-right-angle-incarnation-crosses/": "/learn/incarnation-cross/",
    "/human-design-left-angle-incarnation-crosses/": "/learn/incarnation-cross/",
    "/human-design-juxtaposition-incarnation-crosses/": "/learn/incarnation-cross/",
    "/human-design-charts-of-famous-people/": "/learn/",
    "/human-design-people-by-profile/": "/learn/profiles/",
    "/human-design-people-by-type/": "/learn/types/",
    "/human-design-services/": "/",
}

case_sensitive = {
    "/Manifesting-Generator-strategy/": "/learn/types/manifesting-generator/",
    "/Projector-strategy/": "/learn/types/projector/",
    "/Reflector-strategy/": "/learn/types/reflector/",
}

for old, new in sorted(en_edu.items()):
    lines.append(f"Redirect 301 {old} {new}")

lines.append("")
lines.append("# Case-sensitive strategy URLs (capital letters in original)")
for old, new in sorted(case_sensitive.items()):
    lines.append(f"Redirect 301 {old} {new}")

# ============================================================
# ENGLISH READINGS -> PRODUCT PAGES
# ============================================================
lines.append("")
lines.append("# ============================================================")
lines.append("# READINGS / OLD SERVICE PAGES -> PRODUCT PAGES")
lines.append("# ============================================================")
lines.append("")

readings = {
    "/chiron-return-reading/": "/chiron-return-report/",
    "/saturn-return-reading/": "/saturn-return-report/",
    "/uranus-opposition-reading/": "/uranus-opposition-report/",
    "/solar-return-reading/": "/solar-return-report/",
    "/incarnation-reading/": "/geneticmatrix-reports/",
    "/dream-reading/": "/geneticmatrix-reports/",
    "/career-reading-service/": "/geneticmatrix-reports/",
    "/life-cycle-reading/": "/geneticmatrix-reports/",
    "/family-reading-service/": "/geneticmatrix-reports/",
    "/business-small-group-reading/": "/geneticmatrix-reports/",
    "/complete-foundation-service/": "/foundation-talking-chart/",
    "/body-transformation-service/": "/talking-charts/",
    "/mind-transformation-service/": "/talking-charts/",
    "/mind-variable-talking-chart/": "/variable-talking-chart/",
    "/sleep-transit-talking-chart/": "/sleep-connection-transit-talking-chart/",
}

for old, new in sorted(readings.items()):
    lines.append(f"Redirect 301 {old} {new}")

# ============================================================
# GERMAN
# ============================================================
lines.append("")
lines.append("# ============================================================")
lines.append("# GERMAN (/de/) -> LEARN HUB")
lines.append("# ============================================================")
lines.append("")

de_edu = {
    "/de/informationszentrum/": "/learn/",
    "/de/human-design-hat-die-antworten-fuer-dich/": "/learn/",
    "/de/weisst-du-wer-du-bist/": "/learn/",
    "/de/human-design-types/": "/learn/types/",
    "/de/human-design-generator/": "/learn/types/generator/",
    "/de/human-design-der-manifestierende-generator/": "/learn/types/manifesting-generator/",
    "/de/human-design-der-manifestor/": "/learn/types/manifestor/",
    "/de/human-design-projektor/": "/learn/types/projector/",
    "/de/human-design-reflektor/": "/learn/types/reflector/",
    "/de/typenstrategie/": "/learn/types/",
    "/de/human-design-innere-autoritaet/": "/learn/",
    "/de/the-9-centers/": "/learn/centers/",
    "/de/human-design-kopfzentrum/": "/learn/centers/",
    "/de/menschliches-design-ajna-zentrum/": "/learn/centers/",
    "/de/human-design-halszentrum/": "/learn/centers/",
    "/de/human-design-das-selbst-g-zentrum/": "/learn/centers/",
    "/de/menschliches-design-herzzentrum/": "/learn/centers/",
    "/de/human-design-sakralzentrum/": "/learn/centers/",
    "/de/human-design-solarplexuszentrum/": "/learn/centers/",
    "/de/human-design-milzzentrum/": "/learn/centers/",
    "/de/menschliches-design-stammzentrum/": "/learn/centers/",
    "/de/human-design-die-lebenskraftkanaele/": "/learn/channels/",
    "/de/die-tore-und-ihr-gegenueber/": "/learn/gates/",
    "/de/die-12-profile/": "/learn/profiles/",
    "/de/profil-1-3/": "/learn/profiles/profile-1-3/",
    "/de/profil-1-4/": "/learn/profiles/profile-1-4/",
    "/de/profil-2-4/": "/learn/profiles/profile-2-4/",
    "/de/profil-2-5/": "/learn/profiles/profile-2-5/",
    "/de/profil-3-5/": "/learn/profiles/profile-3-5/",
    "/de/profil-3-6/": "/learn/profiles/profile-3-6/",
    "/de/profil-4-1/": "/learn/profiles/profile-4-1/",
    "/de/profil-4-6/": "/learn/profiles/profile-4-6/",
    "/de/profil-5-1/": "/learn/profiles/profile-5-1/",
    "/de/profil-5-2/": "/learn/profiles/profile-5-2/",
    "/de/profil-6-2/": "/learn/profiles/profile-6-2/",
    "/de/profil-6-3/": "/learn/profiles/profile-6-3/",
    "/de/human-design-inkarnationskreuze/": "/learn/incarnation-cross/",
    "/de/menschliches-design-inkarnation-sonnentisch/": "/learn/incarnation-cross/",
    "/de/human-design-rechtswinkelinkarnation-kreuznamen/": "/learn/incarnation-cross/",
    "/de/human-design-linkswinkelinkarnation-kreuznamen/": "/learn/incarnation-cross/",
    "/de/human-design-juxtapositionsinkarnation-kreuznamen/": "/learn/incarnation-cross/",
}

for old, new in sorted(de_edu.items()):
    lines.append(f"Redirect 301 {old} {new}")

# ============================================================
# SPANISH
# ============================================================
lines.append("")
lines.append("# ============================================================")
lines.append("# SPANISH (/es/) -> LEARN HUB")
lines.append("# ============================================================")
lines.append("")

es_edu = {
    "/es/centro-de-informacion/": "/learn/",
    "/es/sabes-quien-eres/": "/learn/",
    "/es/que-mas-sabre/": "/learn/",
    "/es/tipos-de-diseno-humano/": "/learn/types/",
    "/es/diseno-humano-generador/": "/learn/types/generator/",
    "/es/diseno-humano-generador-manifestante/": "/learn/types/manifesting-generator/",
    "/es/diseno-humano-el-manifestador/": "/learn/types/manifestor/",
    "/es/diseno-humano-proyector/": "/learn/types/projector/",
    "/es/diseno-humano-reflector/": "/learn/types/reflector/",
    "/es/the-9-centers/": "/learn/centers/",
    "/es/human-design-head-center/": "/learn/centers/",
    "/es/human-design-ajna-center/": "/learn/centers/",
    "/es/diseno-humano-centro-garganta/": "/learn/centers/",
    "/es/human-design-g-center/": "/learn/centers/",
    "/es/diseno-humano-centro-corazona/": "/learn/centers/",
    "/es/diseno-humano-centro-sacro/": "/learn/centers/",
    "/es/human-design-solar-plexus-center/": "/learn/centers/",
    "/es/human-design-splenic-center/": "/learn/centers/",
    "/es/diseno-humano-centro-rai/": "/learn/centers/",
    "/es/human-design-the-12-profiles/": "/learn/profiles/",
    "/es/human-design-1-3-perfil/": "/learn/profiles/profile-1-3/",
    "/es/human-design-1-4-perfil/": "/learn/profiles/profile-1-4/",
    "/es/human-design-2-4-profile/": "/learn/profiles/profile-2-4/",
    "/es/human-design-2-5-perfil/": "/learn/profiles/profile-2-5/",
    "/es/human-design-3-5-perfil/": "/learn/profiles/profile-3-5/",
    "/es/human-design-3-6-profile/": "/learn/profiles/profile-3-6/",
    "/es/human-design-4-1-profile/": "/learn/profiles/profile-4-1/",
    "/es/human-design-4-6-profile/": "/learn/profiles/profile-4-6/",
    "/es/human-design-5-1-profile/": "/learn/profiles/profile-5-1/",
    "/es/human-design-5-2-profile/": "/learn/profiles/profile-5-2/",
    "/es/human-design-6-2-profile/": "/learn/profiles/profile-6-2/",
    "/es/human-design-6-3-profile/": "/learn/profiles/profile-6-3/",
}

for old, new in sorted(es_edu.items()):
    lines.append(f"Redirect 301 {old} {new}")

# ============================================================
# FRENCH
# ============================================================
lines.append("")
lines.append("# ============================================================")
lines.append("# FRENCH (/fr/) -> LEARN HUB")
lines.append("# ============================================================")
lines.append("")

fr_edu = {
    "/fr/centre-dinfos/": "/learn/",
    "/fr/le-design-humain-a-vos-reponses/": "/learn/",
    "/fr/do-you-know-who-you-are/": "/learn/",
    "/fr/types-de-conception-humaine/": "/learn/types/",
    "/fr/design-humain-generateur/": "/learn/types/generator/",
    "/fr/design-humain-le-manifesteur-generateur/": "/learn/types/manifesting-generator/",
    "/fr/design-humain-le-manifesteur/": "/learn/types/manifestor/",
    "/fr/design-humain-projecteur/": "/learn/types/projector/",
    "/fr/design-humain-reflecteur/": "/learn/types/reflector/",
    "/fr/strategie/": "/learn/types/",
    "/fr/design-humain-autorite/": "/learn/",
    "/fr/les-9-centres/": "/learn/centers/",
    "/fr/design-humain-centre-ajna/": "/learn/centers/",
    "/fr/design-humain-centre-de-la-gorge/": "/learn/centers/",
    "/fr/design-humain-centre-du-soi-g/": "/learn/centers/",
    "/fr/design-humain-centre-du-coeur/": "/learn/centers/",
    "/fr/design-humain-centre-sacral/": "/learn/centers/",
    "/fr/design-humain-le-centre-du-plexus-solaire/": "/learn/centers/",
    "/fr/design-humain-centre-splenique/": "/learn/centers/",
    "/fr/design-humain-centre-de-la-racine/": "/learn/centers/",
    "/fr/le-design-humain-les-canaux-de-la-force-de-vie/": "/learn/channels/",
    "/fr/conception-humaine-portes/": "/learn/gates/",
    "/fr/conception-humaine-les-12-profils/": "/learn/profiles/",
    "/fr/conception-humaine-profil-1-3/": "/learn/profiles/profile-1-3/",
    "/fr/conception-humaine-profil-1-4/": "/learn/profiles/profile-1-4/",
    "/fr/conception-humaine-profil-2-4/": "/learn/profiles/profile-2-4/",
    "/fr/conception-humaine-profil-2-5/": "/learn/profiles/profile-2-5/",
    "/fr/conception-humaine-profil-3-5/": "/learn/profiles/profile-3-5/",
    "/fr/conception-humaine-profil-3-6/": "/learn/profiles/profile-3-6/",
    "/fr/conception-humaine-profil-4-1/": "/learn/profiles/profile-4-1/",
    "/fr/conception-humaine-profil-4-6/": "/learn/profiles/profile-4-6/",
    "/fr/conception-humaine-profil-5-1/": "/learn/profiles/profile-5-1/",
    "/fr/conception-humaine-profil-5-2/": "/learn/profiles/profile-5-2/",
    "/fr/conception-humaine-profil-6-2/": "/learn/profiles/profile-6-2/",
    "/fr/conception-humaine-profil-6-3/": "/learn/profiles/profile-6-3/",
    "/fr/croix-dincarnation/": "/learn/incarnation-cross/",
    "/fr/design-humain-noms-des-croix-dincarnation-les-croix-de-langle-droit/": "/learn/incarnation-cross/",
    "/fr/design-humain-noms-des-croix-dincarnation-les-croix-de-langle-gauche/": "/learn/incarnation-cross/",
    "/fr/design-humain-noms-des-croix-dincarnation-les-croix-de-juxtaposition/": "/learn/incarnation-cross/",
    "/fr/design-humain-tableau-de-liicarnation-du-soleil/": "/learn/incarnation-cross/",
}

for old, new in sorted(fr_edu.items()):
    lines.append(f"Redirect 301 {old} {new}")

# ============================================================
# ITALIAN
# ============================================================
lines.append("")
lines.append("# ============================================================")
lines.append("# ITALIAN (/it/) -> LEARN HUB")
lines.append("# ============================================================")
lines.append("")

it_edu = {
    "/it/centro-informazioni/": "/learn/",
    "/it/human-design-ha-le-risposte-per-te/": "/learn/",
    "/it/sai-cosa-sei/": "/learn/",
    "/it/tipi-di-progettazione-umana/": "/learn/types/",
    "/it/design-umano-generatore/": "/learn/types/generator/",
    "/it/design-umano-il-generatore-manifestante/": "/learn/types/manifesting-generator/",
    "/it/human-design-il-manifestatore/": "/learn/types/manifestor/",
    "/it/design-umano-proiettori/": "/learn/types/projector/",
    "/it/design-umano-riflettori/": "/learn/types/reflector/",
    "/it/a-tua-strategia/": "/learn/types/",
    "/it/design-umano-autorita-interna/": "/learn/",
    "/it/i-9-centri/": "/learn/centers/",
    "/it/design-umano-centro-testa/": "/learn/centers/",
    "/it/design-umano-centro-gola/": "/learn/centers/",
    "/it/disegno-umano-centro-di-se-g/": "/learn/centers/",
    "/it/design-umano-centro-cuore/": "/learn/centers/",
    "/it/design-umano-centro-sacrale/": "/learn/centers/",
    "/it/design-umano-centro-del-plesso-solare/": "/learn/centers/",
    "/it/design-umano-centro-splenico/": "/learn/centers/",
    "/it/progettazione-umana-centro-radice/": "/learn/centers/",
    "/it/design-umano-i-canali-della-forza-vitale/": "/learn/channels/",
    "/it/le-porte-e-le-opposizioni/": "/learn/gates/",
    "/it/l-12-profili/": "/learn/profiles/",
    "/it/human-design-profilo-1-3/": "/learn/profiles/profile-1-3/",
    "/it/human-design-profilo-1-4/": "/learn/profiles/profile-1-4/",
    "/it/human-design-profilo-2-4/": "/learn/profiles/profile-2-4/",
    "/it/human-design-profilo-2-5/": "/learn/profiles/profile-2-5/",
    "/it/human-design-profilo-3-5/": "/learn/profiles/profile-3-5/",
    "/it/human-design-profilo-3-6/": "/learn/profiles/profile-3-6/",
    "/it/human-design-profilo-4-1/": "/learn/profiles/profile-4-1/",
    "/it/human-design-profilo-4-6/": "/learn/profiles/profile-4-6/",
    "/it/human-design-profilo-5-1/": "/learn/profiles/profile-5-1/",
    "/it/human-design-profilo-5-2/": "/learn/profiles/profile-5-2/",
    "/it/human-design-profilo-6-3/": "/learn/profiles/profile-6-3/",
    "/it/croci-di-incarnazione/": "/learn/incarnation-cross/",
    "/it/design-umano-nomi-delle-croci-dellincarnazione-dellangolo-destro/": "/learn/incarnation-cross/",
    "/it/design-umano-nomi-delle-croci-dellincarnazione-dellangolo-sinistro/": "/learn/incarnation-cross/",
    "/it/design-umano-nomi-delle-croci-dellincarnazione-giustapposte/": "/learn/incarnation-cross/",
    "/it/human-design-tabella-dellincarnazione-solare/": "/learn/incarnation-cross/",
}

for old, new in sorted(it_edu.items()):
    lines.append(f"Redirect 301 {old} {new}")

# ============================================================
# DUTCH
# ============================================================
lines.append("")
lines.append("# ============================================================")
lines.append("# DUTCH (/nl/) -> LEARN HUB")
lines.append("# ============================================================")
lines.append("")

nl_edu = {
    "/nl/info-centrum/": "/learn/",
    "/nl/human-design-heeft-de-antwoorden-voor-jou/": "/learn/",
    "/nl/wat-zal-ik-verder-nog-te-weten-komen/": "/learn/",
    "/nl/human-design-types/": "/learn/types/",
    "/nl/human-design-generator/": "/learn/types/generator/",
    "/nl/human-design-de-manifesterende-generator/": "/learn/types/manifesting-generator/",
    "/nl/human-design-de-manifestor/": "/learn/types/manifestor/",
    "/nl/human-design-projector/": "/learn/types/projector/",
    "/nl/human-design-reflector/": "/learn/types/reflector/",
    "/nl/strategie/": "/learn/types/",
    "/nl/human-design-innerlijke-autoriteit/": "/learn/",
    "/nl/de-9-centra/": "/learn/centers/",
    "/nl/human-design-hoofd-centrum/": "/learn/centers/",
    "/nl/human-design-ajna-centrum/": "/learn/centers/",
    "/nl/human-design-keel-centrum/": "/learn/centers/",
    "/nl/human-design-zelf-g-centrum/": "/learn/centers/",
    "/nl/human-design-hart-centrum/": "/learn/centers/",
    "/nl/human-design-sacrale-centrum/": "/learn/centers/",
    "/nl/human-design-solar-plexus-centrum/": "/learn/centers/",
    "/nl/human-design-milt-centrum/": "/learn/centers/",
    "/nl/human-design-wortel-centrum/": "/learn/centers/",
    "/nl/human-design-de-leven-kracht-kanalen/": "/learn/channels/",
    "/nl/human-design-poorten/": "/learn/gates/",
    "/nl/human-design-1-3-profiel/": "/learn/profiles/profile-1-3/",
    "/nl/human-design-1-4-profiel/": "/learn/profiles/profile-1-4/",
    "/nl/human-design-2-5-profiel/": "/learn/profiles/profile-2-5/",
    "/nl/human-design-3-5-profiel/": "/learn/profiles/profile-3-5/",
    "/nl/human-design-3-6-profiel/": "/learn/profiles/profile-3-6/",
    "/nl/human-design-4-1-profiel/": "/learn/profiles/profile-4-1/",
    "/nl/human-design-4-6-profiel/": "/learn/profiles/profile-4-6/",
    "/nl/human-design-5-1-profiel/": "/learn/profiles/profile-5-1/",
    "/nl/human-design-5-2-profiel/": "/learn/profiles/profile-5-2/",
    "/nl/human-design-6-2-profiel/": "/learn/profiles/profile-6-2/",
    "/nl/human-design-6-3-profiel/": "/learn/profiles/profile-6-3/",
    "/nl/incarnatie-kruisen/": "/learn/incarnation-cross/",
    "/nl/human-design-incarnatie-zon-tabel/": "/learn/incarnation-cross/",
    "/nl/human-design-rechter-hoek-incarnatie-kruis-namen/": "/learn/incarnation-cross/",
    "/nl/human-design-linker-hoek-incarnatie-kruis-namen/": "/learn/incarnation-cross/",
    "/nl/human-design-nevenschikking-incarnatie-kruis-namen/": "/learn/incarnation-cross/",
}

for old, new in sorted(nl_edu.items()):
    lines.append(f"Redirect 301 {old} {new}")

# ============================================================
# PORTUGUESE
# ============================================================
lines.append("")
lines.append("# ============================================================")
lines.append("# PORTUGUESE (/pt-pt/) -> LEARN HUB")
lines.append("# ============================================================")
lines.append("")

pt_edu = {
    "/pt-pt/centro-de-informacoes/": "/learn/",
    "/pt-pt/o-design-humano-tem-as-respostas-para-voce/": "/learn/",
    "/pt-pt/voce-sabe-quem-voce-e/": "/learn/",
    "/pt-pt/tipos-design-humano/": "/learn/types/",
    "/pt-pt/design-humano-gerador/": "/learn/types/generator/",
    "/pt-pt/design-humano-o-gerador-manifestante/": "/learn/types/manifesting-generator/",
    "/pt-pt/design-humano-o-manifestador/": "/learn/types/manifestor/",
    "/pt-pt/design-humano-projetor/": "/learn/types/projector/",
    "/pt-pt/human-design-reflector/": "/learn/types/reflector/",
    "/pt-pt/tipos-de-estrategia/": "/learn/types/",
    "/pt-pt/design-humano-autoridade-interior/": "/learn/",
    "/pt-pt/os-9-centros/": "/learn/centers/",
    "/pt-pt/design-humano-centro-cabeca/": "/learn/centers/",
    "/pt-pt/design-humano-centro-ajna/": "/learn/centers/",
    "/pt-pt/design-humano-centro-garganta/": "/learn/centers/",
    "/pt-pt/design-humano-centro-g-do-ser/": "/learn/centers/",
    "/pt-pt/design-humano-centro-coracao/": "/learn/centers/",
    "/pt-pt/design-humano-centro-sacral/": "/learn/centers/",
    "/pt-pt/design-humano-centro-do-plexo-solar/": "/learn/centers/",
    "/pt-pt/human-design-centro-baco/": "/learn/centers/",
    "/pt-pt/human-design-root-center/": "/learn/centers/",
    "/pt-pt/as-portas-e-oposicoes/": "/learn/gates/",
    "/pt-pt/os-12-perfis/": "/learn/profiles/",
    "/pt-pt/perfil-1-3/": "/learn/profiles/profile-1-3/",
    "/pt-pt/perfil-1-4/": "/learn/profiles/profile-1-4/",
    "/pt-pt/perfil-2-4/": "/learn/profiles/profile-2-4/",
    "/pt-pt/perfil-2-5/": "/learn/profiles/profile-2-5/",
    "/pt-pt/perfil-3-5/": "/learn/profiles/profile-3-5/",
    "/pt-pt/perfil-3-6/": "/learn/profiles/profile-3-6/",
    "/pt-pt/perfil-4-1/": "/learn/profiles/profile-4-1/",
    "/pt-pt/perfil-4-6/": "/learn/profiles/profile-4-6/",
    "/pt-pt/perfil-5-1/": "/learn/profiles/profile-5-1/",
    "/pt-pt/perfil-5-2/": "/learn/profiles/profile-5-2/",
    "/pt-pt/perfil-6-2/": "/learn/profiles/profile-6-2/",
    "/pt-pt/perfil-6-3/": "/learn/profiles/profile-6-3/",
    "/pt-pt/design-humano-cruzes-de-encarnacao/": "/learn/incarnation-cross/",
    "/pt-pt/design-humano-tabela-da-encarnacao-do-sol/": "/learn/incarnation-cross/",
    "/pt-pt/design-humano-nomes-cruzados-da-encarnacao-do-angulo-direito/": "/learn/incarnation-cross/",
    "/pt-pt/design-humano-nomes-cruzados-da-encarnacao-do-angulo-esquerdo/": "/learn/incarnation-cross/",
    "/pt-pt/design-humano-nomes-cruzados-de-encarnacao-de-justaposicao/": "/learn/incarnation-cross/",
}

for old, new in sorted(pt_edu.items()):
    lines.append(f"Redirect 301 {old} {new}")

# ============================================================
# JUNK / OTHER -> homepage or relevant product page
# ============================================================
lines.append("")
lines.append("# ============================================================")
lines.append("# JUNK / MISC PAGES -> HOMEPAGE OR RELEVANT PAGE")
lines.append("# ============================================================")
lines.append("")

junk = {
    "/do-you-know-what-you-are/": "/learn/",
    "/do-you-know-who-you-are/": "/learn/",
    "/is-the-answer/": "/learn/",
    "/the-magnetic-monopole/": "/learn/",
    "/saturn/": "/saturn-return-report/",
    "/uranus/": "/uranus-opposition-report/",
    "/acc-upgrade/": "/plans-features/",
    "/buy-membership-yearly/": "/plans-features/",
    "/package-price-table/": "/plans-features/",
    "/test-subscription/": "/plans-features/",
}

for old, new in sorted(junk.items()):
    lines.append(f"Redirect 301 {old} {new}")

# ============================================================
# NOINDEX
# ============================================================
lines.append("")
lines.append("# ============================================================")
lines.append("# NOINDEX RECOMMENDATIONS")
lines.append("# These should NOT be redirected. Instead add:")
lines.append("# <meta name=\"robots\" content=\"noindex\">")
lines.append("# or block via robots.txt")
lines.append("# ============================================================")
lines.append("")
lines.append("# System pages (add noindex meta tag):")
lines.append("#   /login/")
lines.append("#   /login-1/")
lines.append("#   /applogin/")
lines.append("#   /forgot-password/")
lines.append("#   /cart/")
lines.append("#   /logout/")
lines.append("#   /wp-login.php?loginSocial=facebook")
lines.append("")
lines.append("# PDFs (add to robots.txt):")
lines.append("#   Disallow: /wp-content/uploads/ebooks/")
lines.append("#   Disallow: /wp-content/uploads/hmpdf/")
lines.append("#   Disallow: /wp-content/uploads/samples/")
lines.append("")
lines.append("# Internal/white-label pages (add noindex):")
lines.append("#   /white-label/wl-chart-two.php")
lines.append("#   /white-label/wl-chart-three.php")
lines.append("#   /white-label/wl-chart-ten.php")
lines.append("#   /white-label/free-foundation-chart.php?lang=en")
lines.append("#   /wp-content/themes/geneticmatrix/assets/chart_svg.php")
lines.append("#   /mailers/support.html")
lines.append("#   /custom-search/")
lines.append("#   /edit-chart-form/")
lines.append("#   /animal-human-connection-sleep-chart-form/")
lines.append("#   /sleep-connection-transit-form/")
lines.append("#   /dream-composite-chart/")
lines.append("#   /personal-material-chart/")
lines.append("")
lines.append("# Fix broken redirect:")
lines.append("#   /human-design/ currently 301s to a Spanish profile page")
lines.append("#   Should redirect to /learn/ or /")

# Count and insert total
redirect_count = sum(1 for l in lines if l.startswith("Redirect 301"))
lines.insert(5, f"# Total redirects: {redirect_count}")

with open(r"C:\Users\info\Working\Website-Dev\learn-hub\redirects-301.conf", "w", encoding="utf-8") as f:
    f.write("\n".join(lines) + "\n")

print(f"Done. {redirect_count} redirects written to redirects-301.conf")
