#Problema:
#Leer un archivo *.csv y agregar solo los numeros a una matriz de 3 x n

def datos():
	#Esta funcion no sirve para mi caso xd
	#Pero la dejo por si le sirve a alguien XD
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

	#quitamos los saltos de linea del archivo que se le, y nos devuelve una lista

	hola = archivo.read().split('\n');

	archivo.close()

	print(hola)

	#en matriz es claro que se guarda la matriz xD
	#en temp se va hacer un arreglo temporal de 3x1 para que posteriormente se agregue a la matriz, dando esa forma de matriz

	matriz, tmp = [], []

	#s es la variable para agregar los numeros y comas

	s = ''
	
	tam = len(hola)

	i, j = 0, 0
	#En este ciclo se agrega los numero separados por comas, y se quita la coma del final c:
	#la razo de porque agregar todo es para que los numero con dos digitos o mas, no se separen en esos digitos
	#Ejemplo: 100
	#si no se hubiese metido todo en un string y al momento de hacer un split como se ve mas adelante
	#Quedaris de esta manera [1,2,3,4,1,0]
	#y ese no es el caso, entonces se agrega las comas para hacer un split y poder pasar esos numero grandes en la matriz
	while i < tam:

		#j +=1
		
		s += hola[i]
		i += 1
		if i != tam:
			s += ','
	print(s)
	#se seaparan los numeros de las comas asi quedandonos solo con los numeros
	s = s.split(',')

	print(s)

	tam = len(s)

	i, j = 0, 0
	#Este ciclo lo que hace es agregar tres numeros en una lista y esa lista se agrega posteriormente a una matriz
	#Para poder hacer esto hice uso de un contador de 0 a 2 con este me garantiza que solo se agregan tres numeros a la lista
	#Posteriormente cuando ese contador llega a tres la lista se vuelve a hacer vacia asi como el contador para garantizarnos que solo cuente tres
	while j < tam:
		if i != 3:
			tmp.append(s[j])
			print(tmp)
			i += 1
			print("is", i)
		elif i == 3:
			print("else", i)
			matriz.append(tmp)
			i = 0
			tmp = []
			tmp.append(s[j])
			print(s[j])
			i += 1
		j += 1
	#En esta parte del codigo use este if para meter a ultima lista que hay en tmp para agregarla a la matriz
	#La razon es que el contador j no cumplia la condicion del ciclo y por esa razo ya no entraba al ciclo xd
	if i == 3:
		matriz.append(tmp)
		tmp = []

	print(matriz)




datos2()
