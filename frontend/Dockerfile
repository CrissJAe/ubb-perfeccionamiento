FROM nginx:alpine

#página estática
RUN mkdir -p /usr/share/nginx/html && printf '%s\n' \
  '<!DOCTYPE html>' \
  '<html lang="es">' \
  '<head>' \
  '  <meta charset="UTF-8">' \
  '  <title>UBB — Perfeccionamiento Académico</title>' \
  '  <style>' \
  '    body { font-family: Arial, Helvetica, sans-serif; background: #edf1f4; color: #364e62; margin: 0; }' \
  '    header { background: #2d6e9f; color: #fff; padding: 12px 24px; font-size: 18px; }' \
  '    main { max-width: 700px; margin: 40px auto; background: #fff; border: 1px solid #d5dde4; border-top: 4px solid #5aa5d2; padding: 24px; }' \
  '    h1 { margin-top: 0; color: #2d6e9f; font-weight: 400; }' \
  '  </style>' \
  '</head>' \
  '<body>' \
  '  <header>Universidad del Bío-Bío</header>' \
  '  <main>' \
  '    <h1>Módulo de Perfeccionamiento Académico</h1>' \
  '    <p>Scaffolding inicial del frontend. En las siguientes iteraciones se reemplazará por las vistas reales usando el stack institucional (PHP + plantillas Smarty).</p>' \
  '  </main>' \
  '</body>' \
  '</html>' > /usr/share/nginx/html/index.html

EXPOSE 80

CMD ["nginx", "-g", "daemon off;"]