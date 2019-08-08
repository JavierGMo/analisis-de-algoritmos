def datos():
	archivo =  open("./dat.csv", "r+")
	cadena = archivo.read()
	cadena = cadena.split('\n')
	ca
	print(cadena)
	for i in cadena:
		print(i)
	nca = []
	temp = []
	for ca in cadena:
		if ca != '\n':
			if ca != ',':
				temp.append(ca)
		else:
			nca.append(temp)
			temp = []
		print(nca)

	print(nca)

	
	archivo.close()




def datos2():
	print("datos2")
	archivo = open("./dat.csv", "r")

	hola = archivo.read().split('\n');

	archivo.close()

	print(hola)

	matriz, tmp = [], []

	s = ''
	
	tam = len(hola)

	i, j = 0, 0
	
	while i < tam:

		j +=1
		
		s += hola[i]
		i += 1
		if i == j and i != tam:
			s += ','
	print(s)

	s = s.split(',')

	print(s)

	tam = len(s)

	i, j = 0, 0

	while i < tam:
		print(s[i])
		i += 1

	print(matriz)




datos2()
