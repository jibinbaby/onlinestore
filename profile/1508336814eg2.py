var=lambda x:x**2
print(var(2))

cub=lambda x:x**3


alpha=['a','b','c','d','e','f','g','h','i','j','k','l','m','n','o','p','q','r','s','t','u','v','w','x','y','z']

def chec(alpha):
    vow=['a','e','i','o','u']
    if alpha in vow:
        return 1
    else:
        return 0

f=filter(chec,alpha)
print(list(f))





def sq(n):
    return n**2

list2=[1,2,3,4,5,6,7,8,9,10]
res=map(sq,list2)
print(list(res))
