ncols = 5
nrows = 3
cellsize = 4
xllcorner = -14
yllcorner = 6
ytlcorner = 6 + (nrows * cellsize)
xtlcorner = -14



map = """0 1 2 3 4
10 11 12 13 14
20 21 22 23 24
"""


out = ''
for nr, row in enumerate(map.splitlines()):
    for nc, col in enumerate(row.split()):
        if int(col):
            coordinate_set = '<coordinates>'
            tlc = xtlcorner + (nc * cellsize), (-nr * cellsize) + ytlcorner
            trc = xtlcorner + ((nc + 1) * cellsize), (-nr * cellsize) + ytlcorner
            blc = xtlcorner + (nc * cellsize), ((-nr - 1) * cellsize) + ytlcorner
            brc = xtlcorner + ((nc + 1) * cellsize), ((-nr - 1) * cellsize) + ytlcorner

            for coordinate in (tlc, trc, brc, blc):
                coordinate_set += '\n\t{},{}'.format(coordinate[0], coordinate[1])
            coordinate_set += '\n</coordinates>'
            final_square = """
            <Placemark>
              <visibility>1</visibility>
              <name>
                {}
              </name>
              <Polygon>
                <tessellate>1</tessellate>
                <outerBoundaryIs>
                  <LinearRing>
                    {}
                  </LinearRing>
                </outerBoundaryIs>
              </Polygon>
            </Placemark>""".format(col, coordinate_set)
            out += final_square

document = """<Document>
{}
</Document>""".format(out)


with open('testkml2.kml', 'w') as f:
    f.write(document)